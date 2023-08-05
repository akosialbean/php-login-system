<?php
    require_once "db_conn.php";
    session_start();

    if(isset($_POST['submit'])){
        session_destroy();
        // if(session_destroy()){
        //     echo "session destroyed";
        // }else{
        //     echo "failed";
        // }
        header('Location: ' . 'index.php');
        exit;
    }
?>