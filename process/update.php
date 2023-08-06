<?php
    // DB CONNECTION
    $host = "127.0.0.1";
    $username = "root";
    $password = "Local.123";
    $db = "crud";
    $db_con = new mysqli($host, $username, $password, $db);
?>
<?php
    if($db_con){
        if(isset($_POST['update'])){
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $gender = $_POST['gender'];
            $bdate = $_POST['bdate'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user_id = $_POST['user_id'];

            $query = "UPDATE user SET first_name='$first_name', last_name='$last_name', gender='$gender', bdate='$bdate', username='$username', email='$email', password='$password' WHERE id='$user_id'";

            if($db_con->query($query) === TRUE){
                header('Location: ../components/users.php');
            }else{
                echo 'Error updating record: ' . $db_con->error;
            }
        }else{
            header('Location: ../components/users.php');
        }
    }
    exit;
?>
