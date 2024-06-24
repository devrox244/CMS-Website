<?php require_once("Back\Db.php"); ?>
<?php require_once("Back\Functions.php"); ?>
<?php require_once("Back\Sessions.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Dashboard</title>
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

            <form action="Dashboard.php" method="get">
                <input name="search" type="text" placeholder="search here">
                <button name="SearchButton" class="btn btn-primary">Go</button>
            </form>
        </div>
    </nav>
    <!-- navbar end -->

    <section class="container text-white bg-dark">
        <h1>My Content Management System</h1>
    </section>


    <div class="container">
        <div class="row mt-4">
            <div class="col-sm-8">
                <h1>The Blog</h1>

                <?php
                global $conn;

                if(isset($_GET["SearchButton"])){
                    $search = $_GET["search"];
                    $sql = "SELECT * FROM posts
                    WHERE title LIKE :search
                    OR category LIKE :search
                    OR post LIKE :search
                    OR author LIKE :search";

                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(":search", '%'.$search.'%');
                    $stmt->execute();
                } else{
                    $idFromURL = $_GET["id"];
                    $sql = "SELECT * FROM posts WHERE id='$idFromURL'";
                    $stmt = $conn->query($sql);
                }
                while ($DataRows = $stmt->fetch()) {
                    $id = $DataRows["id"];
                    $title = $DataRows["title"];
                    $category = $DataRows["category"];
                    $author = $DataRows["author"];
                    $banner = $DataRows["image"];
                    $description = $DataRows["post"];
                ?>

                    <div class="card mt-5" style="max-width: 550px;">
                        <img src="Upload/<?php echo $banner; ?>" class="img-fluid card-img-top" style="max-height: 450px; max-width: 550px;">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $title; ?></h4>
                            <small class="text-muted">Author: <?php echo $author ?></small>
                            <span class="badge" style="float:right; color:black;">Comments 20</span>
                            <hr>
                            <p class="card-text"><?php echo $description ?></p>
                        </div>
                    </div> 
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>