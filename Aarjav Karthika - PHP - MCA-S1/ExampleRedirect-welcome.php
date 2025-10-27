<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
</head>
<body>
    <?php
    // Check if the form data is received
    if (isset($_POST['name'])) {
        $name = htmlspecialchars($_POST['name']); // Prevent XSS
        echo "<h2>Welcome, $name!</h2>";
    } else {
        echo "<h2>No name provided. Please go back and enter your name.</h2>";
    }
    ?>
</body>
</html>
