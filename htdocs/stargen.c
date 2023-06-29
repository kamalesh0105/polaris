#include <stdio.h>
#include <stdlib.h>
int main(int argc, char *argv[])
{
    if (argc < 2)
    {
        printf("Usage :%s\n <rows>", argv[0]);
    }
    else
    {
        int rows = atoi(argv[1]);
        for (int i = 0; i < rows; i++)
        {
            for (int j = 0; j <= i; j++)
            {
                /* code */
                printf("*");
            }
            printf("\n");
        }
    }
}
