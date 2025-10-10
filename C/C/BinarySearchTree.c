#include <stdio.h>
#include <stdlib.h>

// Define the node structure
typedef struct Node {
    int data;
    struct Node* left;
    struct Node* right;
} Node;

// Create a new node with given data
Node* createNode(int data) {
    Node* newNode = malloc(sizeof(Node));
    if (!newNode) {
        printf("Memory allocation error\n");
        exit(1);
    }
    newNode->data = data;
    newNode->left = newNode->right = NULL;
    return newNode;
}

// Insert data into the BST and return the root pointer
Node* insert(Node* root, int data) {
    if (root == NULL) 
        return createNode(data);

    if (data < root->data)
        root->left = insert(root->left, data);
    else if (data > root->data)
        root->right = insert(root->right, data);
    // If data == root->data, do nothing (no duplicates)

    return root;
}

// Inorder traversal to print the BST (sorted order)
void inorder(Node* root) {
    if (root == NULL) return;
    inorder(root->left);
    printf("%d ", root->data);
    inorder(root->right);
}

int main() {
    Node* root = NULL;

    int values[] = {50, 30, 20, 40, 70, 60, 80};
    int n = sizeof(values)/sizeof(values[0]);

    for (int i = 0; i < n; i++)
        root = insert(root, values[i]);

    printf("Inorder traversal of BST: ");
    inorder(root);
    printf("\n");

    return 0;
}
