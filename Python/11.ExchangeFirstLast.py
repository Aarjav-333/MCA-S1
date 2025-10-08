# Get input from the user
s = input("Enter a string: ")

# Check if the string length is greater than 1
if len(s) > 1:
    # Exchange first and last characters
    new_s = s[-1] + s[1:-1] + s[0] 
else:
    # If it's a single character or empty, no change
    new_s = s

print("String after exchanging first and last characters:", new_s)
