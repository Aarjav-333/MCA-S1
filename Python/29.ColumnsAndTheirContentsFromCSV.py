import csv

with open("data.csv", "r") as file:
    reader = csv.DictReader(file)

    # Specify the columns you want to read
    columns_to_read = ["Name", "City"]

    for row in reader:
        values = [row[col] for col in columns_to_read]
        print(values)
