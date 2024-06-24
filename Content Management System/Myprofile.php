<?php require_once("Back\Db.php"); ?>
<?php require_once("Back\Functions.php"); ?>
<?php require_once("Back\Sessions.php"); ?>
<?php 
    $Admin = $_SESSION["name"];
    $User = $_SESSION["username"];
    $Pass = $_SESSION["password"]    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>CMS</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-secondary">
        <div class="container">
            <div class="navbar-brand">
                <a href="#">Content Management System</a>
            </div>

            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="MyProfile.php" class="nav-link">My Profile</a></li>
                <li class="nav-item"><a href="Dashboard.php" class="nav-link">Dashboard</a></li>
                <li class="nav-item"><a href="Categories.php" class="nav-link">Add New Category</a></li>
                <li class="nav-item"><a href="Post.php" class="nav-link">Add New Posts</a></li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="" class="nav-link">Logout</a></li>
            </ul>
        </div>
    </nav>
    <!-- navbar end -->

    <section class="container" style="width: max-content; float: left;">
        <div class="card">
            <div class="card-header bg-dark text-light">
                <h3 style="text-align: center;"> Welcome <?php echo $Admin; ?></h3>
            </div>
            <div class="card-body bg-secondary text-light">
                <table>
                    <tr>
                        <td>Username:</td>
                        <td><?php echo $User; ?></td>
                    </tr>
                    <tr>
                        <td>Current Password:</td>
                        <td><?php echo $Pass; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </section>

    <section class="container py-2 mb-4 ml-5">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="background-color: black; color: white; text-align: center;">Your Posts</h3>
                <table class="table table-stripped table-hover" style="background-color: gray; text-align: center;">
                    <thead class="thead-dark">
                        <tr>
                            <th class="dark">Post ID</th>
                            <th class="dark">Title</th>
                            <th class="dark">Image</th>
                            <th class="dark">Description</th>
                            <th class="dark">Action</th>
                        </tr>
                    </thead>
                    <?php
                    global $conn;
                    $Admin = $_SESSION["username"];
                    $sql = "SELECT * FROM posts where author = :author";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(":author", $Admin);
                    $stmt->execute();
                    while ($DataRows = $stmt->fetch()) {
                        $id = $DataRows["id"];
                        $title = $DataRows["title"];
                        $banner = $DataRows["image"];
                        $description = $DataRows["post"];
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $title ?></td>
                                <td><img src="Upload/<?php echo $banner ?>" alt="No Image" height="20%" width="20%"></td>
                                <td><?php echo $description; ?></td>
                                <td>
                                    <a href="EditPost.php?id=<?php echo $id; ?>"><button class="btn btn-warning">Edit</button></a>
                                    <a href="DeletePost.php?id=<?php echo $id; ?>"><button class="btn btn-danger">Delete</button></a>
                                    <a href="FullPost.php?id=<?php echo $id; ?>"><button class="btn btn-primary">Preview</button></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>