<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <title>Rona Stores</title>
</head>
<body>
    <header>
        <nav>
            <p style="font-size: 30px;">
                <a href="index.php">Rona Stores</a>
            </p>
            <p>
                
                <?php if(!isset($_SESSION['loggedIn'])){ ?>
                
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
                <a href="forgot.php">Forgot Password</a>
                
                <?php } else { ?>

                <a href="logout.php">Logout</a>
                <a href="reset.php">Reset Password</a>

                <?php } ?> 
            </p>
        </nav>
    </header>