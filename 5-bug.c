#include <stdio.h>
#include<stdlib.h>
 typedef struct node
 {
 	int data;
 	struct node *next;
 }node;
  node *head;
  node *getnode(int x)
  {
  	node *p;
  	p=(node*)malloc(sizeof(node));
  	p->data=x
  	p->next=NULL;
  	return p;
  }
  void createlist();
  void displaylist();
  void insertbeg();
  void insertany();
  void insertend();
  void delbeg();
  void delany();
  void delend();
  void bubblesort();
  void reverse();
  int main()
  {
  	int ch,x;
  	do
  	{
  		printf("1. Create List \n2. Dipsplay List\n3. Insert at Beginning\n4. Insert at middle \n5. Insert at end\n6. Del from beginning\n7. Del from middle\n8. Del at end\n9. Reverse the list\n10. To sort the element\n0. To exit\n Enter Your Choice\n");
  		scanf("%d",&ch);
  		switch(ch)
  		{
  			case 1:
  				createlist();
  				break;
  			case 2:
			    displaylist();
			    break;
			case 3:
			    insertbeg();
			    break;
			case 4:
			    insertany();
				break;
			case 5:
			    insertend();
				break;
			case 6:
			    delbeg();
				break;
			case 7:
			    delany();
				break;
			case 8:
			    delend();
				break;
			case 9:
			    reverse();
				break;
			case 10:
			bubblesort();
			break;		
			case 0:
			  exit(0);
			 default:
			  printf("Wrong Input\n"): 								
		  }
	}while(1);
	return 0;
}
	void createlist()
	{
		int x;
		node *p,*q;
		printf("Input No.(-999 to stop)\n");
		scanf("%d",&x);
		while(x!=-999)
		{
			p=getnode(x);
			if(head==NULL)
			   head=p;
			else
			   q->next=p;
			q=p
		    printf("Input No.(-999 to stop)\n");	      
		    scanf("%d",&x);
		}
	}
	void displaylist()
	{
		node *p;
		if(head==NULL)
		{
			printf("List does not exist\n");
		}
		p=head;
		while(p!=NULL)
		{
			printf("%d\n",p->data);
			p=p->next;
		}
	}
	void insertbeg()
	{
		node *p; int x;
		if(head==NULL)
		{
			printf("List does not exist\n");
			retrun;
		}
		printf("Enter the element to insert at the beginning\n");
		scanf("%d",&x);
		p=getnode(x);
		p->next=head;
		head=p;
	}
	void insertend()
	{
		int x;
		node *p,*q;
		if(head==NULL)
		{
			print("List does not exist\n");
			return;
		}
		printf("Input the element to be inserted at the end\n");
		scanf("%d",&x);
		p=getnode(x);
		q=head;
		while(q->next!=NULL)
		{
			q=q->next;
		}
		q->next=p;
	}
	void insertany()
	{
		int x,pos,c=1;
		node *p,*q;
		if(head==NULL)
		{
			printf("List does not exist");
			return;
		}
		printf("Input the element to be inserted\n");
		scanf("%d",&x);
		p=getnode(x);
		printf("Input the position\n");
		scanf("%d",&pos);
		q=head
		if(pos==1)
		{
			p->next=head;
			head=p;
			return;
		}
		while(c<pos-1&&q->next!=NULL)
		{
			c++;
			q=q->next;
		}
		p->next=q->next;
		q->next=p;
	}
	void delbeg()
	{
		node *p:
		if(head==NULL)
		{
			printf("List does not exist\n");
			return;
		}
		p=head;
		head=head->next;
		free(p);
	}
	void delend()
	{
		node *p,*q;
		if(head==NULL)
		{
			printf("List does not exist\n");
			return;
		}
		p=head;
		q=head;
		while(q->next!=NULL)
		{
			p=q;
			q=q->next;
		}
		if(p==q)
		{
			head=NULL;
			free(p);
		}
		else
		{
			p->next=NULL;
			free(q);
		}
	}
	void delany()
	{
		node *p,*q;
		int x;
		if(head==NULL)
		{
			printf("List does not exist\n");
			return;
		}
		p=head;
		q=head;
		printf("Enter the element to be deleted\n");
		scanf("%d",&x);
		while(q->next!=NULL && q->data!=x)
		{
			p=q;
			q=q->next;
		}
		if(q->data!=x)
		{
			printf("Element not found\n");
			return;
		}
		if(p==q)
		{
			head=head->next;
			p->next=NULL
			free(p);
		}
		else
		{
			p->next=q->next;
			free(q);
		}
	}
	void reverse()
	{
		node *p,*q,*r;
		p=NUL;
		q=head;
		r=q->next;
		while(r!=NULL)
		{
			q->next=p;
			p=q;
			q=r;
			r=r->next;
		}
		q->next=p;
		head=q;
	}
	void bubblesort()
 	{
 		int n=0,i,j,t;
 		node *p;
 		p=head;
  		while(p!=NULL)
  		{
    		n++;
 	 		p=p->next;
  		}
 		p=head;
 		for(i=0;i<n-1;i++)
 		{
 			for(j=0;j<n-i-1,j++)
 			{
 				if(p->data>p->next->data)
 				{
 					t=p->data;
 					p->data=p->next->data;
 					p->next->data=t;
		 		}
		 	p=p->next;
	 		}
	 	p=head;	 
 		}
	}
