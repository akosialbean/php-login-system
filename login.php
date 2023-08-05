<?php
    require_once "db_conn.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $submit = $_POST['submit'];

    if(isset($submit)){
        $query = "SELECT * FROM user WHERE username='$username' && password='$password'";
        $result = $db_con->query($query);
        if($result){
            header('Location: ' . 'index.php');
        }else{
            header('Location: ' . 'index.php');
        }
    }
?>