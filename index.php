<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="post">
        <label for="first_name">User Name</label>
        <input type="text" name="first_name" id="first_name" placeholder="enter username" required><br>
        <label for="last_name">Password</label>
        <input type="text" name="last_name" id="last_name" placeholder="******" required><br>
        <input type="submit" value="Save" name="submit">
    </form><br>
    Don't have an account? Register <a href="register.php">here</a>
</body>
</html>