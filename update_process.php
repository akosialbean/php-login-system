<?php
    require_once "db_conn.php";
    if($db_con){
        if(isset($_POST['submit'])){
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $gender = $_POST['gender'];
            $bdate = $_POST['bdate'];
            $user_id = $_POST['update_userid'];
            $query = "UPDATE user SET first_name='" . mysqli_real_escape_string($db_con, $first_name) . "', last_name='" . mysqli_real_escape_string($db_con, $last_name) . "', gender='$gender', bdate='$bdate' WHERE id='$user_id'";
            $db_con->query($query);
            header('Location: ' . "users.php");
        }
    }
?>