// big_client.c
//
// from https://www.abc.se/~m6695/udp.html
//
// DMG 2/5/17


#include <arpa/inet.h>
#include <netinet/in.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <string.h>
#include <sys/types.h>
#include <sys/socket.h>


#define BUFLEN 		512
#define NPACK 		10

#define PORT_CLIENT_TO_SERVER		9930
#define PORT_SERVER_TO_CLIENT		9931

#define NO_DATA_RECEIVED		(-1)

#define SRV_IP "127.0.0.1"

void diep(char *str)
{
	perror(str);
	exit(1);
}

int main(void)
{
	struct sockaddr_in si_me; 
	struct sockaddr_in si_other;
	struct sockaddr_in si_send_other;

	int sizeMessage;
	int sizeSendMessage;

	int receiveSocket, transmitSocket;
	int i, slen=sizeof(si_other);
	char buf[BUFLEN];
	char sendBuf[BUFLEN];

	int count = 0;
	int messageNumber = 0;

	printf("Big Client Starting\n");

	if ((receiveSocket =socket(AF_INET, SOCK_DGRAM, IPPROTO_UDP))==-1)
	{
		diep("receive socket AF_INET SOCK_DGRAM IPPROTO_UDP");
	}

	if ((transmitSocket =socket(AF_INET, SOCK_DGRAM, IPPROTO_UDP))==-1)
	{
		diep("transmit socket AF_INET SOCK_DGRAM IPPROTO_UDP");
	}

	// setup receive Socket, client to server
	memset((char *) &si_me, 0, sizeof(si_me));
	si_me.sin_family = AF_INET;
	si_me.sin_port = htons(PORT_SERVER_TO_CLIENT);
	si_me.sin_addr.s_addr = htonl(INADDR_ANY);
	if (bind(receiveSocket, (struct sockaddr *)&si_me, sizeof(si_me))==-1)
	{
		diep("bind receiveSocket si_me");
	}

	// setup transmit Socket, server to client
	memset((char *) &si_send_other, 0, sizeof(si_send_other));
	si_send_other.sin_family = AF_INET;
	si_send_other.sin_port = htons(PORT_CLIENT_TO_SERVER);

	// set IP address of server
	if (inet_aton(SRV_IP, &si_other.sin_addr)==0) 
	{
		fprintf(stderr, "inet_aton() failed\n");
      	exit(1);
    }

	printf("Client Running\n");
/*
	for (i=0;i<NPACK;i++)
	{
		if (recvfrom(s, buf, BUFLEN, 0, (struct sockaddr *)&si_other, &slen)==-1)
		{
			diep("recvfrom");
		}
		printf("Received packet from %s:%d\nData: %s\n\n", inet_ntoa(si_other.sin_addr), ntohs(si_other.sin_port), buf);
	}
*/
	while(1)
	{
		sizeMessage = recvfrom(receiveSocket, buf, BUFLEN, MSG_DONTWAIT, (struct sockaddr *)&si_other, &slen);

		if (sizeMessage == NO_DATA_RECEIVED)	
		{
			usleep(1000);	// 1 ms
			
			if (count++ > 100)
			{
				count = 0;
				messageNumber++;	
				sprintf(sendBuf, "Message Number %d from client", messageNumber);
	
				sizeSendMessage = strlen(sendBuf) + 1;

			   	if (sendto(transmitSocket, sendBuf, sizeSendMessage, 0, (struct sockaddr *)&si_send_other, slen)==-1)
				{
					diep("sendto transmitSocket");
				}
			}
		}
		else
		{
			printf("Client received packet from %s:%d Size: %d\nData: %s\n", inet_ntoa(si_other.sin_addr), ntohs(si_other.sin_port), sizeMessage, buf);
		}
	}

	close(receiveSocket);
	close(transmitSocket);

	printf("Client Done\n");

	return 0;
}



