<!DOCTYPE html>
<html>
<head>
    <title>Dropdown 1–100 Example</title>
</head>
<body>

<form method="POST" action="">
    <label for="number">Select a number:</label>
    <select name="number" id="number">
        <?php
        // Generate dropdown options using a for loop
        for ($i = 1; $i <= 100; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
    </select>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
// When form is submitted
if (isset($_POST['submit'])) {
    $selectedNumber = $_POST['number']; // Get selected value
    echo "<script>alert('You selected: $selectedNumber');</script>"; // Show alert box
}
?>

</body>
</html>
