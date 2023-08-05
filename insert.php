<?php
    require_once "db_conn.php";
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $bdate = $_POST['bdate'];

    

    // if($db_con){
    //     echo "success";
    // }else{
    //     echo "failed";
    // }

    if($db_con){
        if(isset($_POST['submit'])){
            $query = "INSERT INTO user (first_name, last_name, gender, bdate) VALUES ('" . mysqli_real_escape_string($db_con, $first_name) . "', '" . mysqli_real_escape_string($db_con, $last_name) . "', '" . $gender . "', '" . $bdate . "')";
            if($db_con->query($query)){
                header('Location: ' . 'users.php');
            }
        }
    }else{
        // header('Location: ' . 'users.php');
    }
?>
