<?php require_once("Back\Db.php"); ?>
<?php require_once("Back\Functions.php"); ?>
<?php require_once("Back\Sessions.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                <li class="nav-item"><a href="MyProfile.php" class="nav-link" style="text-decoration: none; color: white;">My Profile</a></li>
                <li class="nav-item"><a href="Dashboard.php" class="nav-link" style="text-decoration: none; color: white;">Dashboard</a></li>
                <li class="nav-item"><a href="Categories.php" class="nav-link" style="text-decoration: none; color: white;">Add New Category</a></li>
                <li class="nav-item"><a href="Post.php" class="nav-link" style="text-decoration: none; color: white;">Add New Posts</a></li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="logout.php" class="nav-link" style="text-decoration: none; color: white;">Logout</a></li>
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
        <div class="row">
            <div class="col-8">
                <h1>The Blog</h1>

                <?php
                global $conn;

                if (isset($_GET["SearchButton"])) {
                    $search = $_GET["search"];
                    $sql = "SELECT * FROM posts
                    WHERE title LIKE :search
                    OR category LIKE :search
                    OR post LIKE :search
                    OR author LIKE :search";

                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(":search", '%' . $search . '%');
                    $stmt->execute();
                } else {
                    $sql = "SELECT * FROM posts ORDER BY id desc";
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

                    <div class="card mt-5 mb-5" style="max-width: 550px;">
                        <img src="Upload/<?php echo $banner; ?>" class="img-fluid card-img-top" style="max-height: 450px; max-width: 550px;">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $title; ?></h4>
                            <small class="text-muted" style="font-size: 0.8rem;">Author: <?php echo $author ?>
                                <hr>
                                <p class="card-text" style="font-size: 0.8rem;">
                                    <?php
                                    if (strlen($description) > 150) {
                                        $description = substr($description, 0, 150) . "...";
                                    }
                                    echo $description ?></p>

                                <a href="FullPost.php?id=<?php echo $id; ?>">
                                    <span class="btn btn-info" style="float:right;">Read More</span>
                                </a>
                            </small>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="col-4">
                <div class="container" style="background-color: cyan;">
                    <img src="blog.jpeg" width="95%" height="10%" style="position: sticky;">

                    <h3 style="position: sticky;">Welcome <?php echo $_SESSION["username"]; ?></h3>

                    <h2 style="position: sticky;">Note From Creator</h2>
                    <p style="position: sticky;">Welcome to my blogging website, a space where ideas, stories, and creativity come to life. This platform was born out of a passion for writing and a desire to create a community where voices can be heard, shared, and celebrated. Here, you'll find a diverse range of topics that reflect the multifaceted nature of our world, from personal reflections and creative fiction to in-depth analyses of current events and trends.
                        <br>Creating this website has been a journey of learning and growth. Every line of code, every design choice, and every feature has been meticulously crafted to ensure a seamless and enjoyable user experience. I believe that a blog should be more than just a place to read and write; it should be a hub of interaction and engagement. With this in mind, I've incorporated features that allow readers to comment, share, and discuss posts, fostering a vibrant and dynamic community.
                        <br>I am incredibly grateful for the support and feedback from everyone who has visited and contributed to this site. Your insights and participation are what make this platform truly special. As we continue to grow and evolve, I am committed to maintaining the highest standards of quality and integrity, ensuring that this blog remains a trusted and beloved corner of the internet. Thank you for being a part of this journey, and I look forward to sharing many more stories and ideas with you.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>