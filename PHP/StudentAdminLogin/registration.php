<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head><title>Student Registration</title></head>
<body>
<h2>Student Registration</h2>
<form method="post">
    Roll No: <input type="text" name="rollno" required><br><br>
    Name: <input type="text" name="name" required><br><br>
    Address: <input type="text" name="address"><br><br>
    Phone: <input type="text" name="phone"><br><br>
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    Retype Password: <input type="password" name="repass"><br><br>
    <input type="submit" name="register" value="Register">
</form>

<?php
if (isset($_POST['register'])) {
    $rollno = $_POST['rollno'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn->query("INSERT INTO students(rollno,name,address,phone,username,password)
                  VALUES('$rollno','$name','$address','$phone','$username','$password')");
    echo "<script>alert('Student Registered Successfully');</script>";
}
?>
</body>
</html>
