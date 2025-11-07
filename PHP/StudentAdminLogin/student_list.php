<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head><title>Student List</title></head>
<body>
<h2>All Students</h2>
<table border="1" cellpadding="5">
<tr><th>Roll No</th><th>Name</th><th>Address</th><th>Phone</th><th>Action</th></tr>
<?php
$res = $conn->query("SELECT * FROM students");
while($r = $res->fetch_assoc()) {
    echo "<tr>
            <td>{$r['rollno']}</td>
            <td>{$r['name']}</td>
            <td>{$r['address']}</td>
            <td>{$r['phone']}</td>
            <td><a href='student_edit.php?rollno={$r['rollno']}' target='content'>Update/Delete</a></td>
          </tr>";
}
?>
</table>
</body>
</html>
