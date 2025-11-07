<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head><title>Top Student</title></head>
<body>
<h2>Top Student</h2>
<?php
$r = $conn->query("SELECT s.rollno, s.name, m.science, m.maths, m.english,
                   (m.science+m.maths+m.english) AS total
                   FROM students s JOIN marks m ON s.rollno=m.rollno
                   ORDER BY total DESC LIMIT 1")->fetch_assoc();
if ($r) {
    echo "<table border='1'>
    <tr><th>Roll No</th><th>Name</th><th>Science</th><th>Maths</th><th>English</th><th>Total</th></tr>
    <tr>
    <td>{$r['rollno']}</td><td>{$r['name']}</td><td>{$r['science']}</td>
    <td>{$r['maths']}</td><td>{$r['english']}</td><td>{$r['total']}</td>
    </tr></table>";
}
?>
</body>
</html>
