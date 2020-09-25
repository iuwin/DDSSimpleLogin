<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Main</title>
</head>
<body>
    <p><?php echo "Welcome ". $_SESSION["firstname"]; ?></p>
    <button>Logout</button>
</body>
</html>