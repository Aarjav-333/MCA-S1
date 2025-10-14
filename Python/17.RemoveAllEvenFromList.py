# Original list
numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]

# Create new list with only odd numbers (filter out evens)
result = []
for num in numbers:
    if num % 2 != 0:   # keep only odd numbers
        result.append(num)

print("Original list:", numbers)
print("List after removing even numbers:", result)
