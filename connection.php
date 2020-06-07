<?php

    header("location: index.php");

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "CatDB";
    
    $email = isset($_POST['email']) ? $_POST['email'] : "" ;
    $pswd = isset($_POST['pswd']) ? $_POST['pswd'] : "" ;

    if ($email && $pswd)
    {
        session_start();  
        $hashed_password = hash("sha512", $pswd);
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND password='$hashed_password' ");
        if ($row = mysqli_fetch_assoc($query)) 
        {
            $_SESSION["login"]=$row['name'];
            $_SESSION["admin"]=$row['admin'];
            $_SESSION["email"]=$rows['email'];
        } 
        else
        {
            echo "Error\n";
        }
    } 
    else 
    {
        echo "Error\n";
    }
?>
