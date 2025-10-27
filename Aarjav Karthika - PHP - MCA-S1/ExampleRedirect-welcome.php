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
        echo "<h2>No name provided.</h2>";
    }
    ?>
</body>
</html>
