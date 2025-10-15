rows = 5

for i in range(1, rows + 1):
    # Print leading spaces
    for j in range(rows - i):
        print(' ', end='')
    # Print stars (2*i - 1 for an isosceles triangle)
    for k in range(2 * i - 1):
        print('*', end='')
    print()
