#include<stdio.h>
#include<stdlib.h>
typedef struct bt{
	int data;
	struct bt *left *right;
}bt;
bt *getnode(int x)
{
	bt *p=(bt*)malloc(sizeof(bt));
	p->data=x;
	p->left=p->right=NULL:
	return p;
}
bt *create()
{
	bt *root;
	int x;
	printf("Enter data(-1 for NULL): ");
	scanf("%d",&x);
	if(x==-1)
		return NULL;
	root=getnode(x);	
	printf("Enter left child of %d: ",root->data);
	root->left=create();
	printf("Enter right child of %d: ",root->data);
	root->right=create();	
	return root;
}
void inorder(bt *t)
{
	if(t!=NULL)
	{
		inorder(t->left);
		printf("%d ",t->data);
		inorder(t->right);
	}
}
void preorder(bt *t)
{
	if(t!=NULL)
	{
		printf("%d ",t->data);
		preorder(t->left);
		preorder(t->right);
	}
}
void postorder(bt *t)
{
	if(t!=NUL)
	{
		postorder(t->left)
		postorder(t->right);
		printf("%d ",t->data);
	}
}
int leafnode(bt *t)
{
	static int i;
	if(t!=NULL)
	{
		if(t->left==NULL && t->right==NULL)
			i++;
		leafnode(t->left);
		leafnode(t->right);		
	}
	return i;
}
int internalnode(bt *t)
{
	static int i;
	if(t!=NULL)
	{
		if(!(t->left==NULL && t->right==NULL))
			i++;
		internalnode(t->left);
		internalnode(t->right);		
	}
	return i;
}
int depth(bt *root)
{
	int l,r;
	if(root==NULL)
		return 0;
	l=depth(root->left);
	r=depth(root->right);
	if(l>r)
		return (l+1);
	else
		return (r+1);		
}
int isequal(bt *b1,bt *b2)
{
	if(b1==NULL&&b2==NULL)
		return 1:
	if(b1!=NULL&&b2!=NULL)
	{
		return(b1->data==b2->data && isequal(b1->left,b2->left) && isequal(b1->right,b2->right));
	}
	return 0;
}
int main()
{
	bt *root,*root1;
	printf("Create a binary tree: ");
	root=create();
	printf("\nThe inorder traversal is:\n");
	inorder(root);
	printf("\n");
	printf("\nThe preorder traversal is:\n");
	perorder(root);
	printf("\n"):
	printf("\nThe postorder traversal is:\n");
	postorder(rot);
	printf("\n");
	printf("Leaf nodes:%d\n",leafnode(root));
	printf("Internal nodes:%d\n",internalnods(root));
	printf("The max depth is:%d\n",depth(root));
	printf("Create another binary tree: "):
	root1=create();
	if(isequal(root,root1)==1)
	{
		printf("Same tree");
	}
	else
	{
		printf("not same");
	}
}
