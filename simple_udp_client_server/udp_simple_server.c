// udp_simple_server.c
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
#define PORT		9930


void diep(char *str)
{
	perror(str);
	exit(1);
}

int main(void)
{
	struct sockaddr_in si_me; 
	struct sockaddr_in si_other;
	
	int s, i, slen=sizeof(si_other);
	char buf[BUFLEN];

	printf("Server Starting\n");

	if ((s=socket(AF_INET, SOCK_DGRAM, IPPROTO_UDP))==-1)
	{
		diep("socket AF_INET SOCK_DGRAM IPPROTO_UDP");
	}
	
	memset((char *) &si_me, 0, sizeof(si_me));
	si_me.sin_family = AF_INET;
	si_me.sin_port = htons(PORT);
	si_me.sin_addr.s_addr = htonl(INADDR_ANY);
	if (bind(s, (struct sockaddr *)&si_me, sizeof(si_me))==-1)
	{
		diep("bind s si_me");
	}

	printf("Server Running\n");

	for (i=0;i<NPACK;i++)
	{
		if (recvfrom(s, buf, BUFLEN, 0, (struct sockaddr *)&si_other, &slen)==-1)
		{
			diep("recvfrom");
		}
		printf("Received packet from %s:%d\nData: %s\n\n", inet_ntoa(si_other.sin_addr), ntohs(si_other.sin_port), buf);
	}

	close(s);

	printf("Server Done\n");

	return 0;
}



