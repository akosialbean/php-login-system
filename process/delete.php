<?php
    require_once "../process/update.php";

    $user_id = $_POST['user_id'];

    $query = "DELETE FROM user WHERE id=$user_id";

    if($db_con->query($query)){
        header('Location: ' . 'user.php');
    }
?>
