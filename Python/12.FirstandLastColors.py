# Get the color names from the user, split them, and remove extra spaces
color_list = [c.strip() for c in input("Enter color names separated by commas: ").split(",")]

# Print the first and last colors
print("First color:", color_list[0])
print("Last color:", color_list[-1])
