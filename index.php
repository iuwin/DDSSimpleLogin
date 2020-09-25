<!DOCTYPE html>
<html>
<head>  
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <form method="post" action="login.php">
        <p class="login">Login</p>
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit">Login</button>
        <p class="sign-up">Not registered?<a href="register.php">Create an account</a></p>
        <?php 
            if (isset($_GET['error'])){ ?>
                <p class="error"> <?php echo $_GET['error']; ?> </p>
        <?php } else if(isset($_GET['success'])){ ?>
                <p class="success"> <?php echo $_GET['success']; ?> </p>
        <?php } ?>
    </form>

    
    <script src="main.js"></script>
</body>
</html>