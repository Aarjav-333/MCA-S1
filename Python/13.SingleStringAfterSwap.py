# Get two strings from user
str1 = input("Enter first string: ")
str2 = input("Enter second string: ")

# Swap the first characters and combine
new_str1 = str2[0] + str1[1:]
new_str2 = str1[0] + str2[1:]

# Combine the two new strings
result = new_str1 + " " + new_str2

print("Resulting string:", result)
