<?php require_once "../database/db_conn.php"; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <meta name="author" content="Alvin Castor">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js" defer></script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../components/logout.php">Welcome <strong><?php echo $_SESSION['username']; ?></strong></a>
                <a class="navbar-brand" href="../components/logout.php">Logout</a>
            </div>
        </nav>
        <form action="../process/insert.php" method="post">
            <div class="mb-3 mt-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                   <select name="gender" id="gender" class="form-select">
                    <option value="">--</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="bdate" class="form-label">Birthdate:</label>
                <input type="date" class="form-control" id="bdate" name="bdate">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <hr>
        <table class="table table-bordered table-sm table-striped table-hover">
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
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update_modal<?php echo $row['id']; ?>">
                            Update
                        </button>
                            <form action="update.php/<?php echo $row['id']; ?>" method="post">
                                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                <input type="submit" value="update">
                            </form>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal<?php echo $row['id']; ?>">
                                Delete
                            </button>
                            <form action="delete.php" method="post">
                                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                <input type="submit" value="delete">
                            </form>    
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- The Modal -->
    <?php
        $query = "SELECT * FROM user ORDER BY id DESC";

        $result = $db_con->query($query);
        foreach($result as $row):
    ?>
    <div class="modal" id="update_modal<?php echo $row['id']; ?>">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            
            <div class="modal-body">
                <form action="../process/insert.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                    <div class="mb-3 mt-3">
                        <label for="first_name" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name" value="<?php echo $row['first_name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name" value="<?php echo $row['last_name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender:</label>
                        <select name="gender" id="gender" class="form-select">
                            <option value="<?php echo $row['gender']; ?>"><?php echo $row['id']; ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bdate" class="form-label">Birthdate:</label>
                        <input type="date" class="form-control" id="bdate" name="bdate" value="<?php echo $row['bdate']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
    </div>

    <div class="modal" id="delete_modal<?php echo $row['id']; ?>">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="../process/insert.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                    <div class="mb-3 mt-3">
                        <label for="first_name" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name" value="<?php echo $row['first_name']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name" value="<?php echo $row['last_name']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender:</label>
                        <select name="gender" id="gender" class="form-select" disabled>
                            <option value="<?php echo $row['gender']; ?>"><?php echo $row['id']; ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bdate" class="form-label">Birthdate:</label>
                        <input type="date" class="form-control" id="bdate" name="bdate" value="<?php echo $row['bdate']; ?>" disabled>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
    </div>
    <?php endforeach; ?>
</body>
</html>