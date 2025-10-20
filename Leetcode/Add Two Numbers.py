# Definition for singly-linked list.
class ListNode:
    def __init__(self, val=0, next=None): #If no para is given then the default value would be chosen 
        self.val = val
        self.next = next

class Solution:
    def addTwoNumbers(self, l1: ListNode, l2: ListNode) -> ListNode:
        dummy = ListNode(0)  # Creates the first node with the value -> 1 (We create it coz otherwise we would need to check if the head is NONE everytime)
        current = dummy # it is a pointer that will point to the last node always (As we add new nodes current will move forward)
        carry = 0
        
        while l1 or l2 or carry:
            val1 = l1.val if l1 else 0 # if linked list -> (l1) is not null then l1.val will be assigned else 0
            val2 = l2.val if l2 else 0 # Just like the above one
            total = val1 + val2 + carry

            carry = total // 10     # carry for next step, (this will extract the carry and assign it to the carry variable (floor division Eg: 11 // 10 = 1))
            current.next = ListNode(total % 10)  # create new node and its value will be the digit at the one's place coz the digit should be returned in the reverse order 
            current = current.next 

            # move to next nodes if available
            if l1: l1 = l1.next
            if l2: l2 = l2.next
        
        return dummy.next  # skip dummy head coz at first we assigned the dummy node with value 0 and at the end it is not part of the result, so we return the pointer to the next node which is the next of dummy

l1 = ListNode(2, ListNode(4, ListNode(3)))
l2 = ListNode(5, ListNode(6, ListNode(4)))

sol = Solution()
result = sol.addTwoNumbers(l1,l2)

while result:
    print(result.val, end = "-> ")
    result = result.next