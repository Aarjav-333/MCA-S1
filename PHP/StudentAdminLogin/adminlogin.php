<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
        }
        input[type=submit], input[type=reset] {
            width: 48%;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<form action="" method="POST">
    <h2>Admin Login</h2>
    <label>Username:</label><br>
    <input type="text" name="username" required><br>
    
    <label>Password:</label><br>
    <input type="password" name="password" required><br>
    
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
</form>

</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$servername = "localhost"; // change if needed
$username = "root";        // your MySQL username
$password = "";            // your MySQL password
$dbname = "karthika_db";      // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = $_POST['password'];

// Prepare SQL to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM password WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $user, $pass);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Valid credentials — redirect to blank page
    header("Location: index.php");
    exit();
} else {
    echo "<h3 style='color:red; text-align:center;'>Invalid username or password.</h3>";
}

$stmt->close();
$conn->close();
}
?>
