#include <stdio.h>
#include <stdlib.h>
  struct Node {
        int data;
        struct Node * next;
    };

struct Node * head = NULL;

     struct Node* createNode(int value){
        struct Node* newnode = (struct Node*)malloc(sizeof(struct Node));
        newnode->next = NULL;
        newnode->data = value;
        return newnode;
    }

    void InsertionAtFront(int value){
        struct Node* newnode = createNode(value);
        newnode->data = value;
        newnode->next = head;
        head = newnode;
    }
    void InsertionAtRear(int value){
        struct Node* newnode = createNode(value);
        
        struct Node* temp = head;
        while(temp->next != NULL){
            temp = temp->next;
        }
            temp->next = newnode;

    }
    void InsertionAtArbitaryPosition(int value, int pos){
        struct Node* newnode = createNode(value);
        if(pos < 1){
            printf("Invalid Position\n");
            free(newnode);
            return;
        }
        if (pos == 1){
            newnode->next = head;
            head = newnode;
            return;
        }
        
        
    }
    
int main(){
  
   
}
