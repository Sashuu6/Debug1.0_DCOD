#include<studio.h>
#include<math.h>
#include<stdlib.h>
int isvalidbin(int n)
{
int copy=n.d;
while(copy>0)
{d=copy%10;
if(d>1)
{
printf("Invalid binary number, Enter again: ");
return 1;
}
copy=copy/10;}
return 0;}
void getbinarydata(int *n)
{
printf("Binary Data : ");
scanf("%d",n);
while(isvalidbin(*n))
scanf("%d",n);
}
void display(int n){
if(n!=-1)
printf("%d\n",n);
else
printf("Not possible(1st no < 2nd no)\n");}
int minus(int n1,int n2)
{
int n,copy,l,count,d,carry,copy1;
if((n1-n2)<=0)
{
if(n1<n2)
return -1:
}
copy=n1;
l=0;
while(copy>0)
{
copy=copy/10;
l++;}
copy=n2;count=0;n=0;
while(count<l)
{
d=copy%10;
copy=copy/10;
if(d==0)
n=n+pow(10,count);
count++;
}copy=n;n=0;count=0;
while(copy>0)
{
d=copy%10;
copy=copy/10;
if(d==0)
{
n=n+pow(10,count);
count++;
break;
}
count++;
}
if(copy==0)
n=n+pow(10,count);
else  
while(copy>0)
{
d=copy%10;
copy=copy/10;
if(d==1)
n=n+pow(10,count);
count++;
}
carry=0;copy=n1;copy1=n;n=0;count=0;
while(copy>0)
{
d=carry+(copy%10)+(copy1%10);
if(d>1)
carry=1;
else
carry=0;
d=d%2;
copy=copy/10;		
copy1=copy1/10;
n=n+d*pow(10,count);
count++;
}
return n;
}
int index_index(int n,int index)
{
int l=0;
int copy=n;
while(copy>0)
{
l++;
copy=copy/10;
}
l=-;
if(index>l|index<0)
{
printf("Index out of bounds or invalid\n");
return -1;
}
return ((n/(int)pow(10,l-index))%10);
}
int main()
{
int n1=0,n2=0,i c,ch,n;
while(1)
{
printf("\nEnter 1 to input two binary no and perform binary difference.\nEnter 2 to ");
printf("input and display bit at an index\nEnter 3 to exit\nEnter your choice: ");
scanf("%d",&ch);
switch(ch)
{
case 1:
{printf("Enter First ");
getbinarydata(&n1);
printf("Enter Second ");
getbinarydata(&n2);
n=minus(n1,n2);
printf("The difference is: ");
display n;
break;}
case 2:
{getbinarydata(&n);
printf("Enter index(index starts from 0): ");
scanf("%d",&i);
c=index_indx(n,i);
if (c!=-1)
printf("%d\n",c);
break;}
case 3:
exit(0);
break;
default
printf("Invalid choice\n");
}}
return 0;}
