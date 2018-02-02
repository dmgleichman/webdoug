// udp_simple_client.c
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

#define SRV_IP "127.0.0.1"

void diep(char *str)
{
	perror(str);
	exit(1);
}

int main(void)
{
	struct sockaddr_in si_other;
	
	int s, i, slen=sizeof(si_other);
	char buf[BUFLEN];

	printf("Client Starting\n");

	if ((s=socket(AF_INET, SOCK_DGRAM, IPPROTO_UDP))==-1)
	{
		diep("socket AF_INET SOCK_DGRAM IPPROTO_UDP");
	}
	
	memset((char *) &si_other, 0, sizeof(si_other));
	si_other.sin_family = AF_INET;
	si_other.sin_port = htons(PORT);
	si_other.sin_addr.s_addr = htonl(INADDR_ANY);

	if (inet_aton(SRV_IP, &si_other.sin_addr)==0) 
	{
		fprintf(stderr, "inet_aton() failed\n");
      	exit(1);
    }

	printf("Client Running\n");

	for (i=0; i<NPACK; i++)
	{
    	printf("Sending packet %d\n", i);
    	sprintf(buf, "This is packet %d\n", i);
    	if (sendto(s, buf, BUFLEN, 0, (struct sockaddr *)&si_other, slen)==-1)
        {
			diep("sendto()");
		}

		sleep(1);
	}

	close(s);

	printf("Client Done\n");

	return 0;
}


