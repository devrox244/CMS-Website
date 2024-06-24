<?php require_once("Back\Db.php"); ?>
<?php require_once("Back\Functions.php"); ?>
<?php require_once("Back\Sessions.php"); ?>
<?php
$SearchPost = $_GET["id"];
if (isset($_POST["Publish"])) {
    $Title = $_POST["Title"];
    $Category = $_POST["category"];
    $Picture = $_FILES["Image"]["name"];
    $Target = "Upload/" . basename($_FILES["Image"]["name"]);
    $Description = $_POST["description"];
    $Admin = $_SESSION["username"];

    if (empty($Title)) {
        $_SESSION["ErrorMessage"] = "Title can't be empty";
        redirect_to("YourPost.php");
    } elseif (empty($Description)) {
        $_SESSION["ErrorMessage"] = "Description can't be empty";
        redirect_to("YourPost.php");
    } elseif (strlen($Title) < 5) {
        $_SESSION["ErrorMessage"] = "Title can't be less than 5 characters";
        redirect_to("YourPost.php");
    } elseif (strlen($Title) > 49) {
        $_SESSION["ErrorMessage"] = "Title can't be greater than 50 characters";
        redirect_to("YourPost.php");
    } elseif (strlen($Description) > 999) {
        $_SESSION["ErrorMessage"] = "Description can't be greater than 5 characters";
        redirect_to("YourPosts.php");
    }

    global $conn;
    $sql = "UPDATE posts SET title='$Title', category='$Category', post='$Description', image='$Picture' WHERE id='$SearchPost'";

    move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);

    $Execute = $conn->query($sql);
    if ($Execute) {
        $_SESSION["SuccessMessage"] = "Post Successfully Updated";
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

                <form class="" action="EditPost.php?id=<?php echo $SearchPost; ?>" method="post" enctype="multipart/form-data">
                    <div class="card bg-secondary text-light">
                        <div class="card-header">
                            <h1>Edit Post</h1>
                        </div>

                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="title"><span class="FieldInfo"> Post Title: </span></label>
                                <input type="text" name="Title" class="form-control mb-2" id="title" placeholder="Enter title of Post" value="<?php echo $titleU; ?>">
                            </div>

                            <span class="FieldInfo">Existing Category:</span>
                            <?php echo $CategoryU; ?>

                            <div class="form-group">
                                <label for="title"><span class="FieldInfo"> Select Category: </span></label>
                                <select name="category" id="category" class="form-control mb-2">
                                    <?php
                                    global $conn;
                                    $sql = "SELECT title, id FROM categories";
                                    $stmt = $conn->query($sql);
                                    while ($DateRows = $stmt->fetch()) {
                                        $ID = $DateRows["id"];
                                        $categoryName = $DateRows["title"];
                                    ?>
                                        <option> <?php echo $categoryName; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <span class="FieldInfo">Existing Picture:</span>
                                <img src="Upload/<?php echo $PictureU; ?>" width="170px" height="70px">
                                <br>

                                <label for="Image" class="custom-file-label"> Select Image: </label>
                                <div class="custom-file">
                                    <input type="file" name="Image" id="Image" class="custom-file-input">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description"><span class="FieldInfo"> Post Description: </span></label>
                                <textarea name="description" id="description" rows="8" cols="80" class="form-control mb-2"><?php echo $DescriptionU; ?></textarea>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <button type="submit" name="Publish" class="btn btn-success btn-block">Publish</button>
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