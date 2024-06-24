<?php require_once("Back\Db.php"); ?>
<?php require_once("Back\Functions.php"); ?>
<?php require_once("Back\Sessions.php"); ?>
<?php
$SearchPost = $_GET["id"];
if (isset($_POST["Delete"])) {
    global $conn;
    $sql = "DELETE FROM posts WHERE id='$SearchPost'";

    $Execute = $conn->query($sql);
    if ($Execute) {
        $_SESSION["SuccessMessage"] = "Post Successfully Deleted";
        redirect_to("YourPosts.php");
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
    <title>Edit Posts</title>
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

    <section class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-10">

                <?php
                echo ErrorMessage();
                echo SuccessMessage();

                global $conn;

                $sql = "SELECT * FROM posts WHERE id='$SearchPost'";
                $stmt = $conn->query($sql);
                while ($DataRows = $stmt->fetch()) {
                    $titleU = $DataRows["title"];
                    $CategoryU = $DataRows["category"];
                    $PictureU = $DataRows["image"];
                    $DescriptionU = $DataRows["post"];
                }
                ?>

                <form class="" action="DeletePost.php?id=<?php echo $SearchPost; ?>" method="post" enctype="multipart/form-data">
                    <div class="card bg-secondary text-light">
                        <div class="card-header">
                            <h1>Edit Post</h1>
                        </div>

                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="title"><span class="FieldInfo"> Post Title: </span></label>
                                <input type="text" name="Title" class="form-control mb-2" id="title" placeholder="Enter title of Post" value="<?php echo $titleU; ?>" disabled>
                            </div>

                            <span class="FieldInfo">Existing Category:</span>
                            <?php echo $CategoryU; ?>

                            <span class="FieldInfo">Existing Picture:</span>
                            <img src="Upload/<?php echo $PictureU; ?>" width="170px" height="70px">

                            <div class="form-group">
                                <label for="description"><span class="FieldInfo"> Post Description: </span></label>
                                <textarea name="description" id="description" rows="8" cols="80" class="form-control mb-2" disabled><?php echo $DescriptionU; ?></textarea>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <button type="submit" name="Delete" class="btn btn-danger btn-block">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>