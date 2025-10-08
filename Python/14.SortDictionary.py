# Sample dictionary
my_dict = {"apple": 3, "banana": 1, "cherry": 2}

# Get dictionary items as a list of tuples
items = list(my_dict.items())

# Sort items by value in ascending order
for i in range(len(items)):
    for j in range(i+1, len(items)):
        if items[i][1] > items[j][1]:
            items[i], items[j] = items[j], items[i]

# Convert back to dictionary
asc_sorted = dict(items)
print("Ascending order:", asc_sorted)

# For descending order, just reverse the ascending list
desc_sorted = dict(reversed(items))
print("Descending order:", desc_sorted)
