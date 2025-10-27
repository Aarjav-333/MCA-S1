<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
</head>
<body>
    <?php
    // Check if the form data is received
    if (isset($_GET['name'])) {
        $name = htmlspecialchars($_GET['name']); // Prevent XSS
        echo "<h2>Welcome, $name!</h2>";
    } else {
        echo "<h2>No name provided. Please go back and enter your name.</h2>";
    }
    ?>
</body>
</html>
