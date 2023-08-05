<?php
    session_start();
    require_once "db_conn.php";

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        echo $username . "<br>" . $password;
        $_SESSION['username'] = $username;
        $query = "SELECT * FROM user WHERE username='$username' && password='$password'";
        $result = $db_con->query($query);

        foreach($result as $row){
            $userid = $row['id'];
        }

        if($userid > 0){
            header('Location: ' . 'users.php');
        }else{
            header('Location: ' . 'index.php');
        }
    }
?>