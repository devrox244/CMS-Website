<?php require_once("Back\Db.php"); ?>
<?php require_once("Back\Functions.php"); ?>
<?php require_once("Back\Sessions.php"); ?>
<?php
if (isset($_POST["Publish"])) {
    $username = $_POST["Username"];
    $Password = $_POST["Pass"];
    $ConPass = $_POST["ConPass"];
    $Admin = $_POST["Name"];

    if (empty($username) || empty($Password) || empty($ConPass) || empty($Admin)) {
        $_SESSION["ErrorMessage"] = "FILL ALL FIELDS";
        redirect_to("Admins.php");
    } elseif (strlen($Admin) < 3 || strlen($username) < 3) {
        $_SESSION["ErrorMessage"] = "Name and username should be greater than 3 characters";
        redirect_to("Admins.php");
    } elseif (strlen($Admin) > 49 || strlen($username) > 49) {
        $_SESSION["ErrorMessage"] = "Name and username should be less than 50 characters";
        redirect_to("Admins.php");
    } elseif ($Password !== $ConPass) {
        $_SESSION["ErrorMessage"] = "Passwords do not match";
        redirect_to("Admins.php");
    } elseif (checkAdmin($username)){
        $_SESSION["ErrorMessage"] = "Username already exists. Pick a new username.";
        redirect_to("Admins.php");
    }

    global $conn;
    $sql = "INSERT INTO admin(name, username, password) VALUES(:name, :username, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':name', $Admin);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $Password);

    $Execute = $stmt->execute();
    if ($Execute) {
        $_SESSION["username"] = "$username";
        $_SESSION["name"] = "$Admin";
        $_SESSION["password"] = "$Password";
        $_SESSION["SuccessMessage"] = "User Successfully Added";
        redirect_to("Dashboard.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Admin Registration</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-secondary mb-10">
        <div class="container">
            <div class="navbar-brand">
                <a href="#">Content Management System</a>
            </div>

            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="Dashboard.php" class="nav-link">Dashboard</a></li>
                <li class="nav-item"><a href="Categories.php" class="nav-link">Add New Category</a></li>
                <li class="nav-item"><a href="Post.php" class="nav-link">Add New Posts</a></li>
            </ul>
        </div>
    </nav>
    <!-- navbar end -->

    <div class="name bg-dark">
        <h1 class="MgCat" style="color: white; text-align: center;">Become an Admin!</h1>
    </div>

    <!-- Categories -->
    <section class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-10">

                <?php
                echo ErrorMessage();
                echo SuccessMessage();
                ?>

                <form class="" action="Admins.php" method="post">
                    <div class="card bg-secondary text-light">
                        <div class="card-header">
                            <h1>Registration</h1>
                        </div>

                        <div class="card-body bg-dark">
                            <div class="card-body bg-dark">
                                <div class="form-group">
                                    <label for="Name"><span class="FieldInfo"> Name: </span></label>
                                    <input type="text" name="Name" class="form-control mb-2" id="title" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="Username"><span class="FieldInfo"> Username: </span></label>
                                    <input type="text" name="Username" class="form-control mb-2" id="title" placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <label for="Pass"><span class="FieldInfo"> Password: </span></label>
                                    <input type="password" name="Pass" class="form-control mb-2" id="title" placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <label for="ConPass"><span class="FieldInfo"> Confrim Password: </span></label>
                                    <input type="password" name="ConPass" class="form-control mb-2" id="title" placeholder="Confrim Password">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-2">
                                        <button type="submit" name="Publish" class="btn btn-success btn-block">Publish</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>