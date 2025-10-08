# Two sample dictionaries
dict1 = {"a": 1, "b": 2}
dict2 = {"c": 3, "d": 4}

# Empty dictionary to store merged result
merged_dict = {}

# Add items from the first dictionary
for key in dict1:
    merged_dict[key] = dict1[key]

# Add items from the second dictionary
for key in dict2:
    merged_dict[key] = dict2[key]

print("Merged dictionary:", merged_dict)
