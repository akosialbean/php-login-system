<?php
    // DB CONNECTION
    $host = "127.0.0.1";
    $username = "root";
    $password = "Local.123";
    $db = "crud";
    $db_con = new mysqli($host, $username, $password, $db);
?>
<?php

    $user_id = $_POST['user_id'];
    $confirm_delete = $_POST['confirm_delete'];
    if(isset($_POST['delete'])){
        if($confirm_delete === "DELETE"){
            $query = "DELETE FROM user WHERE id=$user_id";
            if($db_con->query($query)){
                header('Location: ../components/users.php');
            }else{
                header('Location: ../components/users.php');
            }
        }else{
            header('Location: ../components/users.php');
        }
        
    }
    header('Location: ../components/users.php');
    exit;
?>
