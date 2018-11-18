#include<stdio.h>
#include<stdlib.h>
#include<string.h>
int DD,MM,YY;//date variables
int M[13]={0,31,28,31,30,31,30,31,31,30,31,30,31};//reference month
int IsLeap(int y1)//function to check if a year is leap or not
{
	int leap=0;
	if((y1%4==0&&y1%100!=0)||(y1%400==0))
      	 leap=1;
    return leap;
}//end of IsLeap
int IsValid()//check validty of a date
{
	int t=1;
	if((MM>12||MM<1 )|| (DD<1||DD>M[MM]))
	{
		printf("Invalid MONTH or DATE\n");
		t=0;
	}//end of if
	return t;
}//end of IsValid//end of class Date
int  getdate()//Input date from a string
{
	char p[11];
	printf("\nEnter date in DD/MM/YY Format(No other formats are accepted)\nFor example: ");
	printf("1st March 2005 as 01/03/2005\n");
	scanf("%s",&p);
	if(strlen(p)!=10)
	{
		printf("Wrong Input\n");
		return 0;
	}//end of if
	if(p[2]!='/'||p[5]!='/')
	{
		printf("May be Wrong Input or Problem in format\n");
		return 0;
	}//end of if
	DD=((p[0]-48)*10)+(p[1]-48);
	MM=((p[3]-48)*10)+(p[4]-48);
	YY=((p[6]-48)*1000)+((p[7]-48)*100)+((p[8]-48)*10)+(p[9]-48);
	if(IsValid()==0)
		return 0;
	if(IsLeap(YY)==1)//Updates Feb month if leap year..
		M[2]=29;
	else
		M[2]=28;
	return 1;
}//end getdate
int startdate_sat()
{
	int d=0;
	int y,m;
	//Date 01/01/2000 is taken as base month which is a Saturday...
	if(YY>2000)//When input year is after 2000
	{
		y=2000;
		while(y<YY)
		{
			if(IsLeap(y)==1)
				d=(d+2)%7;//366%7=2
			else
				d=(d+1)%7;//365%7=1
			y++;
		}//end of while
	}//end of if
	else if(YY<2000)//when input year is before 2000
	{
		y=YY+1;
		while(y<2000)
		{
			if(IsLeap(y)==1)
				d=(d+2)%7;//same logic as prev
			else
				d=(d+1)%7;//same logic as prev
			y++;
		}//end of while
	}//end of else if
	else//if year is 2000 then do nothing
	{
	}//end of else
	if(YY>=2000)//When year is on or after 2000
	{
		m=1;
		while(m<MM)
		{
			d=(d+(M[m]%7))%7;
			m++;
		}//end of while
		if(d==0)
			d=1;
		else
			d=7-d+1;
	}//end of if
	else//if year is before 2000
	{
		m=12;
		while(m>=MM)
		{
			d=(d+(M[m]%7))%7;
			m--;
		}//end of while
		d=d+1;
	}//end of else
	return d;
}//end of startdate_sat
void compute_and_display()//compute and display no. of sat and sundays
{
	int d=startdate_sat();
	int sat,sun,no_sat=0,no_sun=0;
	if(d==7)
	{
		sun=1;
		sat=7;
	}//end of if
	else
	{
		sat=d;
		sun=d+1;
	}//end of else
	while(sat<=M[MM])
	{
		no_sat++;
		sat=sat+7;
	}//end of while
	while(sun<=M[MM])
	{
		no_sun++;
		sun=sun+7;
	}//end of while
	printf("\nGiven date is ");
	if(DD<10)
		printf("0");
	printf("%d/",DD);
	if(MM<10)
		printf("0");
	printf("%d/",MM);
	printf("%d\n",YY);	
	printf("The no of Saturdays in the month of given date is: %d\n",no_sat);
	printf("The no of Sundays in the month of given date is: %d\n",no_sun);
}//end of compute_and_display
int main()
{
    int t,ch;
	do
	{
printf("\n\nEnter\n1 to Input date and compute\n2.To Exit\n");
		printf("Enter your choice...: ");
		scanf("%d",&ch);
		switch(ch)
		{
			case 1:
				t=getdate();
				if(t==1)
					compute_and_display();
			break;
			case 2:
				exit(0);
			break;
			default:
				printf("Invalid Choice..\n");		
		}//end of switch
	}while(1);//end of do while loop
}//end of main
