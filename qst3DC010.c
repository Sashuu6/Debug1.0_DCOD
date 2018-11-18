#include<stdio.h>
#include<stdlib.h>
void getsize(int *rr,int *cc)
{
	printf("Enter row and column size: ");
	scanf("%d%d",rr,cc);
}
void getdata(int arr[80][80],int rlimit,int climit)
{
	int i,j;
	printf("Enter the matrix:\n");
	for(i=0;i<rlimit;i++)
		for(j=0;j<climit;j++)
			scanf("%d",&arr[i][j]);
}
void display(int arr[80][80],int rlimit,int climit)
{
	int i,j;
	for(i=0;i<rlimit;i++)
	{
		for(j=0;j<climit;j++)
		  printf("%d ",arr[i][j]);
	        printf("\n");
	}
}
void add(int A[80][80],int B[80][80],int C[80][80],int rlimit,int climit)
{
	int i,j;
	for(i=0;i<rlimit;i++)
		for( j=0;j<climit;j++)
			C[i][j]=A[i][j]+B[i][j];				
}
void mul(int A[80][80],int B[80][80],int C[80][80],int rlimit1,int climit1,int rlimit2,int climit2)
{
	int i,j,k,sum;
	for(i=0;i<rlimit1;i++)
	{
		for(j=0;j<climit2;j++)
		{
			sum=0;
			for(k=0;k<climit1;k++)
			{
				sum=sum+A[i][k]*B[k][j];
			}
			C[i][j]=sum;
		}
	}
}
int scan(int rlimit1,int climit1,int rlimit2,int climit2)
{
	//this scan function returns a value according to the current 
//situation..
	//and it is responsible for activating particular menu options...
	if((climit1!=rlimit2)&&(rlimit1!=rlimit2 || climit1!=climit2))//neither 
//mul nor sum
		return 1;
	else if(!(rlimit1==rlimit2&&climit1==climit2))//cannot sum..only 
//mul
		return 2;
	else if(climit1!=rlimit2)//cannot mul..only sum
		return 3;
	else //can mul as well as sum
		return 4;		
}
void menuprint(int p)//prints menu options accorting to situation..
{
	printf("\n");
	//prints menus according to the situation from scan function
	if(p==1)
	 printf("Cannot do anything...\nEnter 1 to input size and matrix\nEnter 4 to exit\n");
	else if(p==2)
	 printf("Cannot do sum...\nEnter 1 to input size and matrix\nEnter 3 for mul\nEnter 4 to exit\n");
	else if(p==3)
	 printf("Cannot Mul...\nEnter 1 to input size and matrix\nEnter 2 for sum\nEnter 4 to exit\n");
	else if(p==4)
	 printf("Enter 1 to input size and matrix\nEnter 2 for sum\nEnter 3 for Mul\nEnter 4 to exit\n");
	else
	 printf("Enter 1 to input size and matrix\nEnter 4 to exit\n");
 printf("Enter your choice: ");
}//end of menuprint
int main()
{
	int stat=-1,ch,A[80][80],B[80][80],rlimit1,rlimit2,climit1,climit2,C[80][80];
	//stat=-1 initial cond.
	//variable stat stores the corresponding return value of the current situation...
	printf("Menu options will be provide as per your input\n");
	do
	{
		menuprint(stat);//prints menu acc to situation
		scanf("%d",&ch);
		switch(ch)
		{
			case 1:
				printf("\nEnter matrix 1:\n");
				getsize(&rlimit1,&climit1);
				printf("%d %d\n",rlimit1,climit1);
				getdata(A,rlimit1,climit1);
				printf("\nEnter matrix 2:\n");
				getsize(&rlimit2,&climit2);
				stat=scan(rlimit1,climit1,rlimit2,climit2);
				if(stat==1)
					break;
				if(stat==2)
printf("NOTE:- Cannot do sum with this dimention of matrix(Only Mul)\nContinue to input the matrix\n\n");
				else if(stat==3)
printf("NOTE:- Cannot do mul with this dimention of matrix(Only Sum)\nContinue to input the matrix\n\n");
				else
				{
					//do nothing
				}//end of else		
				getdata(B,rlimit2,climit2);
				break;
			case 2:
				if(stat==-1||stat==1||stat==2)//checking 'sum' situation
				{
					printf("Invalid choice\n");
				}//end of if
				else
				{
					printf("The summation is:\n\n");
					add(A,B,C,rlimit1,climit1);
					display(C,rlimit1,climit1);
				}//end of else
				break;
			case 3://checking 'mul' situation
				if(stat==-1||stat==1||stat==3)
				{
					printf("Invalid choice\n");
				}//end of if
				else
				{
					printf("The mul is:\n\n");
					mul(A,B,C,rlimit1,climit1,rlimit2,climit2);
					display(C,rlimit1,climit2);
				}//end of else
				break;
			case 4:
				exit(0);//exit from program
			default:
				printf("Invalid choice\n");		
		}//end of switch case
	}while(1);//end of do while loop
	return 0;
}//end of main
