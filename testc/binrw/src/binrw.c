/*
 ============================================================================
 Name        : binrw.c
 Author      : Doug Gleichman 2/4/18
 Version     :
 Copyright   : Your copyright notice
 Description : Binary data structures read write for testing PHP pack() and upack() functions
 ============================================================================
 */

#include <stdio.h>
#include <stdlib.h>

typedef struct sTestStructure
{
	int aInt;
	float bFloat;
	int cInt;
} tTestStructure;

tTestStructure ReadData = { 0, 0.0, 0 };
tTestStructure WriteData = { 44, 12.53, 6745 };

char inputFileName[200] = "read_data_file.txt";
char outputFileName[200] = "write_data_file.txt";


int read_file(void)
{
	FILE * fdin;
	int size, structSize;

	fdin = fopen(inputFileName, "rb");
	if(fdin == NULL)
	{
		printf("Can't read %s\n", inputFileName);
		return -1;
	}

	structSize = sizeof(ReadData);

	size = fread(&ReadData, 1, structSize, fdin);

	if (size != structSize)
	{
		printf("Error in read size\n");
		return -2;
	}

	fclose(fdin);

	printf("Read data aInt = %d, bFloat = %f, cInt = %d\n", ReadData.aInt, ReadData.bFloat, ReadData.cInt);

	return 0;
}

int write_file(void)
{
	FILE * fdout;
	int structSize, size;

	printf("Write data aInt = %d, bFloat = %f, cInt = %d\n", WriteData.aInt, WriteData.bFloat, WriteData.cInt);

	fdout = fopen(outputFileName, "wb");
	if (fdout == NULL)
	{
		printf("Can't write %s\n", outputFileName);
		return -1;
	}


	structSize = sizeof(WriteData);

	size = fwrite(&WriteData, 1, structSize, fdout);

	if (size != structSize)
	{
		printf("Error in write size\n");
		return -2;
	}

	fclose(fdout);

	return 0;
}

int main(void)
{
	printf("binrw -- binary read and write to test the PHP pack() and unpack() functions\n");

	write_file();

	read_file();

	return EXIT_SUCCESS;
}
