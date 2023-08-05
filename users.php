<?php require_once "db_conn.php"; ?>
<?php echo session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <form action="logout.php" method="post">
        <input type="submit" value="Logout" name="submit">
    </form>
    <form action="insert.php" method="post">
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
        <input type="submit" value="Save" name="submit">
    </form><br>

    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>first name</th>
                <th>last name</th>
                <th>gender</th>
                <th>birth date</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                // $session = $_SESSION['username']; 
                // if($session < 1){
                //     header('Location: ' . 'index.php');
                // }
            ?>
            <?php
                $query = "SELECT * FROM user ORDER BY id DESC";

                $result = $db_con->query($query);
                foreach($result as $row):
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['bdate']; ?></td>
                    <td>
                        <form action="update.php/<?php echo $row['id']; ?>" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                            <input type="submit" value="update">
                        </form>
                    </td>
                    <td>
                        <form action="delete.php" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                            <input type="submit" value="delete">
                        </form>    
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>