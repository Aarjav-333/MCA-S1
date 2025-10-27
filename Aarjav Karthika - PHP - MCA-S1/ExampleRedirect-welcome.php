<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
</head>
<body>
    <?php
    if (isset($_GET['name'])) {
        $name = htmlspecialchars($_GET['name']); 
    } else {
        echo "<h2>No name provided. Please go back and enter your name.</h2>";
    }
    ?>
</body>
</html>
