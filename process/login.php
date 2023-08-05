<?php
    // DB CONNECTION
    $host = "127.0.0.1";
    $username = "root";
    $password = "Local.123";
    $db = "crud";
    $db_con = new mysqli($host, $username, $password, $db);
?>

<?php
session_start();

if(isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $db_con->query($query);

    if($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header('Location: ../components/users.php');
    } else {
        $_SESSION['error'] = 'Invalid username or password';
        header('Location: ../components/users.php');
    }
    exit;
}

?>
