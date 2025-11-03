<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Form</title>
</head>
<body>
    <form action="" method="POST">
        <h2>Student Entry</h2>
        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Mark:</label>
        <input type="number" name="mark" required><br><br>

        <button type="submit">Submit</button>
        <button type="reset">Reset</button>
    </form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "db1");
    if ($conn->connect_error) {
        die("❌ Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $mark = $_POST['mark'];

    $sql = "INSERT INTO tb1 (name, mark) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("❌ SQL prepare failed: " . $conn->error);
    }

    $stmt->bind_param("si", $name, $mark);

    if ($stmt->execute()) {
        echo "<h2>✅ Record Saved Successfully!</h2>";
        echo "<p>Name: $name</p>";
        echo "<p>Mark: $mark</p>";
    } else {
        echo "❌ Error executing statement: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

</body>
</html>
