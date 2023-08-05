<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<form action="register_process.php" method="post">
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name" placeholder="enter first name"><br>
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" id="last_name" placeholder="enter last name"><br>
    <label for="gender">Gender</label>
    <select name="gender" id="gender">
        <option value="">--</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select><br>
    <label for="bdate">Birth Date</label>
    <input type="date" name="bdate" id="bdate"><br>
    <input type="text" name="username" id="username"><br>
    <input type="" name="bdate" id="bdate"><br>
    <input type="submit" value="Save" name="submit">
</form><br>
</body>
</html>
