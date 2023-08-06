<?php
    // DB CONNECTION
    $host = "127.0.0.1";
    $username = "root";
    $password = "Local.123";
    $db = "crud";
    $db_con = new mysqli($host, $username, $password, $db);
?>
<?php

    echo mysqli_connect_errno();
    
    if(isset($_POST['submit'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $bdate = $_POST['bdate'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "INSERT INTO user (first_name, last_name, gender, bdate, username, password, email) VALUES ('$first_name', '$last_name', '$gender', '$bdate', '$username', '$password', '$email')";
        $result = $db_con->query($query);
        header('Location: ../components/users.php');
    }
    exit;
?>
