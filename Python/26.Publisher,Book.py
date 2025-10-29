# Base class
class Publisher:
    def __init__(self, name):
        self.name = name
        print("Publisher constructor called")

    def display(self):
        print(f"Publisher Name: {self.name}")


# Derived class
class Book(Publisher):
    def __init__(self, name, title, author):
        # Invoke base class constructor
        super().__init__(name)
        self.title = title
        self.author = author
        print("Book constructor called")

    # Overriding the base class method
    def display(self):
        # Optionally, call base class version
        super().display()
        print(f"Book Title: {self.title}")
        print(f"Author: {self.author}")


# Example usage
b = Book("Penguin Random House", "The Great Gatsby", "F. Scott Fitzgerald")
print("\nDisplaying details:\n")
b.display()
