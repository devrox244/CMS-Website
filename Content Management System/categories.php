<?php require_once("Back\Db.php"); ?>
<?php require_once("Back\Functions.php"); ?>
<?php require_once("Back\Sessions.php"); ?>
<?php
    if(isset($_POST["Publish"])){
        $Category = $_POST["Title"];
        $Admin = $_SESSION["username"];

        if(empty($Category)){
            $_SESSION["ErrorMessage"] = "FILL ALL FIELDS";
            redirect_to("categories.php");
        }elseif (strlen($Category)<3) {
            $_SESSION["ErrorMessage"] = "Name should be greater than 3 characters";
            redirect_to("categories.php");
        }elseif (strlen($Category)>49) {
            $_SESSION["ErrorMessage"] = "Name should be less than 50 characters";
            redirect_to("categories.php");
        }

        global $conn;
        $sql = "INSERT INTO categories(title, author) VALUES(:title, :adminName)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':title', $Category);
        $stmt->bindValue(':adminName', $Admin);

        $Execute = $stmt->execute();
        if($Execute){
            $_SESSION["SuccessMessage"] = "Category Successfully Added";
            redirect_to("categories.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Categories</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-secondary mb-10">
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

    <div class="name bg-dark">
        <h1 class="MgCat">Manage Categories</h1>
    </div>

    <!-- Categories -->
    <section class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-10">

                <?php
                    echo ErrorMessage();
                    echo SuccessMessage();
                ?>

                <form class="" action="categories.php" method="post">
                    <div class="card bg-secondary text-light">
                        <div class="card-header">
                            <h1>Add New Categories</h1>
                        </div>

                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="title"><span class="FieldInfo"> Category Title: </span></label>
                                <input type="text" name="Title" class="form-control mb-2" id="title" placeholder="Enter title of Category">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>