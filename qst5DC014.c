#include<stdio.h>
#include<stdlib.h>
typedef struct Poly{
	int exp;
	int cof;
	struct Poly *next;
}Poly;
Poly *create()
{
	Poly *p=NULL,*node,*tmp;int e,c;char ch;
	do{
		printf("\nEnter coffeicient 'a' and exponent 'e' of ax^e: ");
		scanf("%d %d",&c,&e);
		node=(Poly*)malloc(sizeof(Poly));
		node->exp=e;node->cof=c;
		node->next=NULL;
		if(p==NULL)
		  p=node;
		else 
		  tmp->next=node;
		tmp=node;
		printf("Any more (Y/y)? ");
		scanf("%c",&ch);
	}while(ch=='y'||ch=='Y');
	return p;
}
int countp(Poly *p)
{
	int c=0;Poly *tmp=p;
	while(tmp!=NULL)
	{
		c++;
		tmp=tmp->next;
	}
	return c;
}
void Sort(Poly *p)
{
	int count=countp(p);
	Poly *tmp=p;int i,temp,j;
	for(i=0;i<count-1;i++)
	{
		for(j=0;j<count-i-1;j++)
		{
			if(tmp->exp<tmp->next->exp)
			{
				temp=tmp->exp;
				tmp->exp=tmp->next->exp;
				tmp->next->exp=temp;
				temp=tmp->cof;
				tmp->cof=tmp->next->cof;
				tmp->next->cof=temp;
			}
			tmp=tmp->next;
		}
		tmp=p;
	}
}
void removerepexp(Poly *p)
{
	Poly *tmp=p,*tmp1;
	while(tmp->next!=NULL)
	{
		if(tmp->exp==tmp->next->exp)
		{
			tmp1=tmp->next;
			tmp->cof=tmp->cof+tmp1->cof;		
			tmp->next=tmp1->next;
			free(tmp1);
		}
		else
		 tmp=tmp->next;
	}
}
Poly* remove0coff(Poly *p)
{
	Poly *tmp=p,*prev=p;
	while(tmp!=NULL)
	{
		if(tmp->cof==0)
		{
			if(prev==tmp)
			{
				tmp=tmp->next;
				p=tmp;
				free(prev);
				prev=tmp;
			}
			else
			{
				prev->next=tmp->next;
				free(tmp);
				tmp=prev->next;
			}
		}
		else
		{
			prev=tmp;
			tmp=tmp->next;
		}
	}
	return p;
}
void display(Poly *p)
{
	Poly *temp=p;int e,c;
	if(temp!=NULL)
	{
		printf("\n%dx^%d",temp->cof,temp->exp);
		temp=temp->next;
	}
	while(temp!=NULL)
	{
		e=temp->exp;
		c=temp->cof;
		if(c>0)
			printf("+");
		printf("%dx^%d",c,e);
		temp=temp->next;	
	}
	printf("\n");
}
Poly* add(Poly *p1,Poly *p2)
{
	Poly *tmp1=p1,*tmp2=p2,*node,*tmp3=NULL,*prev;
	int e,c;
	while(tmp1!=NULL&&tmp2!=NULL)
	{
		node=(Poly*)malloc(sizeof(Poly));
		if(tmp1->exp>tmp2->exp)
		{
			e=tmp1->exp;
			c=tmp1->cof;
			tmp1=tmp1->next;
		}
		else if (tmp1->exp<tmp2->exp)
		{
			e=tmp2->exp;
			c=tmp2->cof;
			tmp2=tmp2->next;
		}
		else
		{
			e=tmp1->exp;
			c=tmp1->cof+tmp2->cof;
			tmp1=tmp1->next;
			tmp2=tmp2->next;
		}
		node->cof=c;
		node->exp=e;
		node->next=NULL;
		if(tmp3==NULL)
		  tmp3=node;
		else
		  prev->next=node;
		 prev=node; 
	}
	while(tmp1!=NULL)
	{
		node=(Poly*)malloc(sizeof(Poly));
		node->cof=tmp1->cof;
		node->exp=tmp1->exp;
		node->next=NULL;
		tmp1=tmp1->next;
		if(tmp3==NULL)
		  tmp3=node;
		else
		  prev->next=node;
		 prev=node; 
	}
	while(tmp2!=NULL)
	{
		node=(Poly*)malloc(sizeof(Poly));
		node->cof=tmp2->cof;
		node->exp=tmp2->exp;
		node->next=NULL;
		tmp2=tmp2->next;
		if(tmp3==NULL)
		  tmp3=node;
		else
		  prev->next=node;
		 prev=node; 
	}
	return tmp3;
}
Poly* mul(Poly *p1,Poly *p2)
{
	Poly *tmp1=p1,*tmp2=p2,*tmp3=NULL,*tmp3prev=NULL,*tmp4,*node,*prev;int c,e;
	while(tmp1!=NULL)
	{
		while(tmp2!=NULL)
		{
			c=(tmp1->cof)*(tmp2->cof);
			e=(tmp1->exp)+(tmp2->exp);
			tmp2=tmp2->next;
			node=(Poly*)malloc(sizeof(Poly));
			node->cof=c;
			node->exp=e;
			node->next=NULL;
			if(tmp3==NULL)
			  tmp3=node;
			else
			  prev->next=node;
			prev=node;
		}		
		tmp4=add(tmp3,tmp3prev);
		removerepexp(tmp4);
		tmp4=remove0coff(tmp4);
		tmp3=NULL;
		tmp3prev=tmp4;
		tmp2=p2;
		tmp1=tmp1->next;
	}
	return tmp4;
}
int main()
{
	Poly *p1,*p2,*p3;
	printf("Enter polynomial 1: ");
	p1=create();
	printf("Enter polynomial 2: ");
	p2=create();
	Sort(p1);Sort(p2);
	p1=remove0coff(p1);p2=remove0coff(p2);
	removerepexp(p1);removerepexp(p2);
	p3=mul(p1,p2);
	printf("The product of the 2 polynomial is: ");
	display(p3);
}
