<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head><title>View Progress Card</title></head>
<body>
<h2>View Progress Card</h2>
<a href="top_student.php" target="content">View Top Student</a><br><br>

<form method="post">
Roll No:
<select name="rollno">
    <option value="">Select Roll No</option>
    <?php
    $res = $conn->query("SELECT rollno FROM students");
    while($r = $res->fetch_assoc()) echo "<option value='{$r['rollno']}'>{$r['rollno']}</option>";
    ?>
</select>
<input type="submit" name="search" value="Search">
</form>

<?php
if (isset($_POST['search'])) {
    $roll = $_POST['rollno'];
    $r = $conn->query("SELECT s.rollno, s.name, m.science, m.maths, m.english, 
                       (m.science+m.maths+m.english) AS total
                       FROM students s JOIN marks m ON s.rollno=m.rollno 
                       WHERE s.rollno='$roll'")->fetch_assoc();
    if ($r) {
        echo "<table border='1'>
        <tr><th>Roll No</th><th>Name</th><th>Science</th><th>Maths</th><th>English</th><th>Total</th></tr>
        <tr>
        <td>{$r['rollno']}</td><td>{$r['name']}</td><td>{$r['science']}</td>
        <td>{$r['maths']}</td><td>{$r['english']}</td><td>{$r['total']}</td>
        </tr></table>";
    }
}
?>
</body>
</html>
