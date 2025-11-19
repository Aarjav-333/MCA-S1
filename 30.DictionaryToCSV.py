import csv

# ----------------------------
# 1. WRITE DICTIONARY TO CSV
# ----------------------------

data = [
    {"Name": "Aishu", "Age": 21, "City": "Chennai"},
    {"Name": "Rohan", "Age": 22, "City": "Bangalore"},
    {"Name": "Meera", "Age": 20, "City": "Mumbai"}
]

with open("output.csv", "w", newline="") as file:
    fieldnames = ["Name", "Age", "City"]
    writer = csv.DictWriter(file, fieldnames=fieldnames)

    writer.writeheader()     # writes: Name,Age,City
    writer.writerows(data)   # writes all rows

print("CSV file written successfully!")

# ----------------------------
# 2. READ THE CSV FILE
# ----------------------------

print("\nContents of the CSV file:")
with open("output.csv", "r") as file:
    reader = csv.reader(file)

    for row in reader:
        print(row)
