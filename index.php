<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
<!-- <?php 
    // $session = $_SESSION['username']; 
    // if($session == TRUE){
    //     header('Location: ' . 'users.php');
    // }
?> -->
    <h1>Login</h1>
    <form action="login.php" method="post">
        <label for="username">User Name</label>
        <input type="text" name="username" id="username" placeholder="enter username" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="******" required><br>
        <input type="submit" value="Save" name="submit">
    </form><br>
    Don't have an account? Register <a href="register.php">here</a>
</body>
</html>