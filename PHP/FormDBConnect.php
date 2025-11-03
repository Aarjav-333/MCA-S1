<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Entry Form</title>
</head>
<body>
    <h2>🎓 Student Entry Form</h2>

    <form action="" method="POST">
        <label>Roll No:</label>
        <input type="number" name="rollno" required><br><br>

        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female" required> Female<br><br>

        <label>Mark 1:</label>
        <input type="number" name="mark1" required><br><br>

        <label>Mark 2:</label>
        <input type="number" name="mark2" required><br><br>

        <button type="submit">Submit</button>
        <button type="reset">Reset</button>
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Database connection
    $conn = new mysqli("localhost", "root", "", "db1");

    if ($conn->connect_error) {
        die("❌ Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $rollno = $_POST['rollno'];
    $name   = $_POST['name'];
    $gender = $_POST['gender'];
    $mark1  = $_POST['mark1'];
    $mark2  = $_POST['mark2'];

    // Prepare and execute query
    $sql = "INSERT INTO students (rollno, name, gender, mark1, mark2) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("❌ SQL prepare failed: " . $conn->error);
    }
    $stmt->bind_param("issii", $rollno, $name, $gender, $mark1, $mark2);

    if ($stmt->execute()) {
        echo "<h3>✅ Record Saved Successfully!</h3>";
        echo "<p>Roll No: $rollno</p>";
        echo "<p>Name: $name</p>";
        echo "<p>Gender: $gender</p>";
        echo "<p>Mark 1: $mark1</p>";
        echo "<p>Mark 2: $mark2</p>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
</body>
</html>
