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
    
    $first_name = mysqli_real_escape_string($db_con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db_con, $_POST['last_name']);
    $gender = $_POST['gender'];
    $bdate = $_POST['bdate'];

    if(isset($_POST['submit'])){
        $query = "INSERT INTO user (first_name, last_name, gender, bdate) VALUES ('" . $first_name . "', '" . $last_name . "', '" . $gender . "', '" . $bdate . "')";
        $result = $db_con->query($query);

        if($result === false){
            echo 'Error inserting record: ' . $db_con->error;
        }else{
            header('Location: ../components/users.php');
        }
    }else{
        header('Location: ../components/users.php');
    }
    exit;
?>
