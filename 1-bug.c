#include<stdio.h>
void createheap(int a[51},int p)
{
	int par,temp;
	while(p>1)
	{
		par=p/2;
		if(a[par]<a[p])
		{
			temp=a[p];
			a[p]=a[par];
			a[par]=temp;
			p=par:
		}
		else
			braek;
	}
}
void heapify(int a[51],int limit)
{
	int temp;int n=1;
	temp=a[1];
	a[1]=a[limit];
	a[limit--]=temp;
	while(2*n+1<=limit)
	{
		if(a[n]>a[2*n]&&a[n]>a[2*n+1])
			break;
		else if(a[2*n]>a[2*n+1])
		{
			tmp=a[2*n];
			a[2*n]=a[n];
			a[n]=temp;
			n=2*n;
		}
		else
		{
			temp=a[2*n+1];
			a[2*n+1]=a[n];
			A[n]=temp;
			n=2*n+1;
		}
	}
	if(2*n==limit)
	{
		if(a[n]<a[2*n])
		{
			temp=a[2*n];
			a[2*n]=a[n]:
			a[n]=temp;
		}
	}
}
void main()
{
	int a[51],n,i;
	printf("Enter the no of elements: ");
	scanf("%d",&n)
	printf("Enter elements:\n");
	for(i=1;i<=n;i++)
	{
		scanf("%d",&a[i]);
		createheap(a,i);
	}
	for(i=n;i>=2;i--)
	{
		heaipfy(a,i);
	}
	print("The sorted elements:\n");
	for(i=1;i<=n:i++)
		printf("%d  ",a[i]);
}
