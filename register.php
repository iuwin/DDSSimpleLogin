<?php include "dbconnection.php"; ?>
<!DOCTYPE html>
<html>
<head>  
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
    <form method="post" action="">
        
        <p class="register"> <a href="index.php" class="back">&laquo;</a> Register</p>
        <input type="text" name="firstname" placeholder="Firstname"><br>
        <input type="text" name="lastname" placeholder="Lastname"><br>
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit">Register</button>
        <?php 
            if (isset($_GET['error'])){ ?>
                <p class="error"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>
    </form>

    <?php
        if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["username"]) && isset($_POST["password"])){
            $fname = $_POST["firstname"];
            $lname = $_POST["lastname"];
            $uname = $_POST["username"];
            $pass = $_POST["password"];


            if (empty($fname) || empty($lname) || empty($uname) || empty($pass)){
                header("Location: register.php?error=Populate all fields");
                exit();
            }else{

                $dbusername = $connection->query("SELECT username FROM employees WHERE username = '$uname'");
                if ($dbusername->num_rows > 0){
                    header("Location: register.php?error=Username already exists");
                    exit();
                }else {
                    $query = "INSERT INTO employees(firstname, lastname, username, password) VALUES ('$fname', '$lname', '$uname', '$pass')";
                    $connection->query($query);
                    header("Location: index.php?success=Successfully Registered");
                    exit();
                }
            }

        }


    ?>
    <script src="main.js"></script>
</body>
</html>