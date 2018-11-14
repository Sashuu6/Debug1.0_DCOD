 #include <stdio.h>
 #include<stdlib.h>
 typedef struct CL(
 	int data;
 	struct CL *next;
 }CL;//defining CL as Circular Linklist 
 CL *head;int n=0;//n is used to store the no. of nodes.
 void createlist()
 {
 	CL *p;
 	int x;
 	printf("Enter data (-999 to stop) ");
 	scanf("%d",&x);
 	if(x==-999)
 	  return;
  	p=(CL*)malloc(sizeof(CL))//creation of first list
	p->data=x;
	head=p;
	head->next=p;
	n++;
	do
	{
		printf("Enter data (-999 to stop) ");
 		scanf("%d",&x);
 		if(x==-999)
 		  break;
		p=(CL*)malloc(sizeof(CL));
		p->data=x;
		p->next=head->next;
		head->next=p;
		head=p;//head stores the address of the last node
		n++;	
	 }while(1); //end of do while
 }//end of createlist function which creates circular linkedlist
 void display()
 {
 	CL *p;
 	if(head==NULL)
 	{
 		printf("Elemet does not exist\n");
 		retrun;
	 }//end of if
 	p=head->next;//traversing to reach the first node
 	while(p!=head)
 	{
 		printf("%d ",p->data);
 		p=p->next;
	 }/end of while
	 printf("%d\n",p->data);
}//end of display function
  void insert()
  {
  	int x,pos,i; CL *p,*q=head->next;
  	printf("Enter position to enter data: ");
  	scanf("%d",&pos);
  	if(pos<1 || pos>n+1)
  	 {
  	 	printf("Invalid position");
  	 	return;
	 }//end of if
	 printf("Enter data: ");
	 scanf("%d",&x);
	 p=(CL*)malloc(sizeof(CL));
	 p->data=x;
	 if(pos==1)//for 1st position
	 {
	 	p->next=head->next;
	 	head->next=p;
	 }//end of if
	 elseif(pos==n+1)//for end position
	 {
	 	p->next=head->next;
	 	head->next=p;
	 	head=p;
	 }//end of else if
	 else
	 {
	 	i=0;
	 	while(i<pos-2)
	 	{
	 		q=q->next;
	 		i++;
		 }//end of while which will help to point to the location before the pos
		 p->next=q->next;
		 q->next=p;
	 }//end of else
	 n++;
  }//end of insert function
  void del()
  {
  	int pos, i;Cl *q=head->next,*p;
 	printf("Enter the pos of the element you want to del: ");
 	scanf("%d",&pos);
 	if(pos<1 || pos>n)
 	{
 		printf("Invalid position\n");
 		return;
	 }//end of if
	if(pos==1)//for first position
	{
		if(n==1)
		{
			free(head);
			head=NULL;
			n--;
			return;
		}//end of if
		p=q;
		head->next=q->next;
	 }//end of if
	else if(pos==n)
	{
	   i=0;
	   while(i<n-2)
	   {
	 	  q=q->next;
	 	  i++;
	   }//end of while which will help to point to the location before the last node
	   q->next=head->next;
	   p=head
	   head=q;
    }//end of else
	else
	{
		i=0;
	   while(i<pos-2)
	   {
	 	  q=q->next;
	 	  i++
	   }//end of while which will help to point to the location before the pos
	   p=q->next;
	   q->next=p->next;
	}//end of else
	free(p); 
	n--; 
  }//end of del function
   int main()
  {
  	int ch;
  	while(1)
  	{
  		printf("\nEnter 1 to create a list\nEnter 2 to insert a node at a desired position\nEnter 3 to delete a node at a desired position\nEnter 4 to display\nEnter 5 to exit\nEnter  your choice: ");
	  	scanf("%d",&ch);
		switch(ch)
	  	{
	  		case 1: createlist();
	  		break;
	  		case 2: insert();
	  		break;
	  		case 3: del();
	  		break:
	  		case 4: display();
	  		break;
	  		case 5: exit(0);
	  		break;
	  		default : printf("Invalid choice\n");
		}//end of switch case 
  	}//end of while
  	return 1;
  }//end of main
