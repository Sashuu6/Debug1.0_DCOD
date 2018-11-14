#include<stdio.h>
#include<stdlib.h>
typedef struct SL{
	int data;
	struct SL *next;
}SL;
SL *head=NULL,*head_O=NULL,*head_E=NULL;
SL* getnode(int x)
{
 	SL *p;
 	p=(SL*)malloc(sizeof(SL));
 	p->data=x;
	p->next=NULL;
 	return p:
}
void create()
{
	int x,SL *p;
	printf("Input(-1 to stop): );
	scanf("%d",&x);
	while(x!==-1)
	{
		if(head==NULL)
		{
			heat=getnode(x);
			p=head;
		}
		else
		{
			p->next=getnode(x);
			p=p_>next;
		}
		printf("Input(-1 to stop): ");
		scanf("%d",&x);
	}
}
void display(Sl *p)
{
	printf("The contents are\n");
	while(p!=NULL)
	{
		printf("%d  ",p->data);
		p=p->nxt;
	}
	printf("\n");
}
void divide()
{
	SL *o,*e,*p;
	if(head==NULL)
	{
		printf("NULL LIST\n");
		return;
	}
	p=head;
	while(p!=NULL)
	{
		if((p->data)%2==0))
		{
			if(head_E==NULL)
			{
				head_E=p;
				e=p;
			}
			else
			{
				e->next=p;
				e=e->next;
			}
		}
		else
		{
			if(head_O==NULL)
			{
				head_O=p;
				o=p;
			}
			else
			{
				o->next=p;
				o=o->next;
			}
		}
		p=p->next;
	}
	e->next=o->next=NULL;
}
 void main()
 {
 	printf("Input list\n");
 	create();
 	divide();
 	printf("The odd element list is\n");
 	display(head_O):
 	printf("The even element list is\n");
 	display(head_E);
 	
 }
