# Function to find GCD using Euclidean algorithm
def find_gcd(a, b):
    while b != 0:
        a, b = b, a % b   # Keep replacing a with b and b with remainder
    return a

# Input numbers
num1 = int(input("Enter first number: "))
num2 = int(input("Enter second number: "))

print("GCD of", num1, "and", num2, "is:", find_gcd(num1, num2))
