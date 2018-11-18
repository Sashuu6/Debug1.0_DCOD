#include<stdio.h>
#include<stdlib.h>
typedef struct bt{
int data,
struct bt *left,*right;
}bt;
bt* getnode(int x)
{
bt *p;
p=(bt*)malloc(sizeof(bt));
p.data=x;p.left=NULL;p.right=NULL;
return p;	
}
bt* create(bt *root)
{
int x,bt *queue[50],*p;int front=-1,rear=-1;
printf("Enter root element (-1 for NIL): ");
scanf("%d",&x);
if(x==-1)
return NULL;
root=getnode(x);
front=rear=0;
queue[rear]=root;
while(front!=-1)
{
p=queue[front];
if(front==rear)
{front=rear=-1;}
else
{front++;}
printf("Enter left element of %d(-1 for Nothing): ",p>data);
scanf("%d",&x);
if(x!=-1)
{
p->left=getnode(x);
if(front==-1 && rear==-1)
{
front=rear=0;
}
else
{
rear++;
}
queue[rear]=p->left;
}
printf("Enter right element of %d(-1 for Nothing): ",p->data);
scanf("%d",&x);
if(x!=-1)
{
p->right=getnode(x);
if(front==-1 && rear==-1)
{
front=rear=0;
}
else
{
rear++;
}
queue[rear]=p->right;
}
}
return root;
}
void display(bt *root)
{
bt *queue[50],*p;
int front=-1,rear=-1;
if(root==NULL)
{
printf("Tree doesnt exist\n");
return;
}
front=rear=0;
queue[rear]=root;
while(front!=-1)
{
p=queue[front];
printf("%d",p->data);
if(front==rear)
{
front=rear=-1;
}
else
{
front++;
}
if(p->left!=NULL)
{
if(front==-1&&rear==-1)
{
rear=front=0;
}
else
{
rear++;
}
queue[rear]=p->left;
}
if(p->right!=NULL)
{
if(front==-1&&rear==-1)
{
rear=front=0;
}
else
{
rear++;
}
queue[rear]=p->right;
}
}
}
void preorder(bt *root)//save the right;traverse the left;
{
bt *stack[50],*ptr;
int top=-1;
if(root==NULL)
{
printf("Tree doesn't exist\n");
return;
}
ptr=root;
do
{
while(ptr!=NULL)
{
printf("%d ",ptr->data);
if(ptr->right!=NULL)
{
stack[++top]=ptr->right;
}
ptr=ptr->left;
}
if(top==-1)
return;
else
ptr=stack[top--];
}while(1);
}
void inorder(bt* root)//save the node..travese left..print..go right..
{
bt *stack[50],*ptr;int top=-1;
if(root==NULL)
{
printf("Tree doesn't exist\n");
return;
}
ptr=root;
do
{
while(ptr!=NULL)
{
stack[++top]=ptr;
ptr=ptr->left;
}
if(top==-1)
return;
ptr=stack[top--];   
printf("%d ",ptr->data);
ptr=ptr->right;
}while(1);
} 
void postorder(bt *root)
{
struct stack{
bt *add;
int status;
}a[50];
bt *ptr;int top=-1;
if(root==NULL)
{
printf("Tree doesn't exist\n");
return;
}
ptr=root;
do
{
while(ptr!=NULL)
{
top++;
a[top].add=ptr;
a[top].status=0;
ptr=ptr->left;
}
while(top!=-1&&a[top].status==1)
{
printf("%d ",(a[top].add)->data);
top--;
}
if(top==-1)
return;
a[top].status=1;
ptr=(a[top].add)->right;
}while(1);
}
int maxdepth(bt *node)
{
int ldepth,rdepth;
if(node==NULL)
return 0;
ldepth=maxdepth(node->left);	
rdepth=maxdepth(node->right);
if(ldepth>rdepth)
return(ldepth+1);
else
return(rdepth+1);	
}
void main()
{
bt *root;
printf("Create root\n");
root=create(root);
display(root);
printf("\nThe preorder traversal\n");
preorder(root);
printf("\nThe postorder traversal\n");
postorder(root);
printf("\nThe inorder traversal\n");
inorder(root);
printf("The maxdepth is %d",maxdepth(root));
}
