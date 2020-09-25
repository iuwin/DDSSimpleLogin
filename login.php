<?php
    //session_start();
    include "dbconnection.php";

    if (isset($_POST["username"]) && isset($_POST["password"])){
        $user = $_POST["username"];
        $pass = $_POST["password"];
        $userTEMP = "";
        $passTEMP = "";
        $nameTEMP = "";
        $idTEMP = "";
        if (empty($user)){  
            header("Location: index.php?error=Input Username");
            exit();
        }else if (empty($pass)){
            header("Location: index.php?error=Input Password");
            exit();
        }else{
            $query = "SELECT * FROM employees WHERE username = '$user' AND password = '$pass'";
            $result = $connection->query($query);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $idTEMP = $row["employee_id"];
                    $userTEMP = $row["username"];
                    $passTEMP = $row["password"];
                    $nameTEMP = $row["firstname"];
                } 
                
                $connection->close();
                //$_SESSION["employee_id"] = $idTEMP;
                //header("Location: main.php");
                echo "<center>";
                echo "<p>Welcome ". $nameTEMP."</p>";
                echo "<a href='index.php'>Logout</a>";
                echo "</center>";
            }
            else {
                header("Location: index.php?error=Invalid Login");
                exit();
            }
        }

    }
    else{
        header("Location: index.php?error=Invalid Login");
        exit();
    }



?>

<style>
    body {
        margin: 50px;
        color: gray;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 30px; 
        background-color: #f4f4f4;
    }

    a {
        font-size: 25px;
        text-decoration: none;
        color: #6666FF;
        
    }

    a:hover{
        color: #0033CC;
    }
<style>
