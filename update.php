<?php require_once "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
        <?php
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
        ?>
        <?php
            $update_id = $_POST['user_id'];
            $query = "SELECT * FROM user WHERE id=$update_id";

            $result = $db_con->query($query);
            foreach($result as $row):
        ?>
        <form action="update" method="post">
            <input type="hidden" name="update_userid" value="<?php echo $row['id']; ?>">

            <label for="first_name">First Name</label>
            <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" id="first_name" placeholder="enter first name"><br>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" id="last_name" placeholder="enter last name"><br>
            <label for="gender">Gender</label>
            <select name="gender" id="gender">
                <option  value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select><br>
            <label for="bdate">Birth Date</label>
            <input type="date" name="bdate" id="bdate" value="<?php echo $row['bdate']; ?>"><br>
            <input type="submit" value="Save" name="submit">
        </form><br>
    <?php endforeach; ?>

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
        </thead>
    </table>
</body>
</html>