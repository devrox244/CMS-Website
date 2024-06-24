<?php require_once("Back\Db.php"); ?>
<?php require_once("Back\Functions.php"); ?>
<?php require_once("Back\Sessions.php"); ?>
<?php
    if(isset($_POST["Submit"])){
        $Username = $_POST["username"];
        $Password = $_POST["password"];

        if(empty($Username)|| empty($Password)){
            $_SESSION["ErrorMessage"] = "Fields cannot be empty";
            redirect_to("Login.php");
        }else{
            $FoundAcc = FetchAcc($Username, $Password);
        }
        if($FoundAcc){
            $_SESSION["id"] = $FoundAcc["id"];
            $_SESSION["username"] = $FoundAcc["username"];
            $_SESSION["name"] = $FoundAcc["name"];
            $_SESSION["password"] = $FoundAcc["password"];
            $_SESSION["SuccessMessage"] = "Welcome $Username";
            redirect_to("Dashboard.php");
        }else{
            $_SESSION["ErrorMessage"] = "Incorrect Username or Password";
            redirect_to("Login.php");
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
    <title>CMS Login</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-secondary mb-10">
        <div class="container">
            <div class="navbar-brand">
                <a href="#">Content Management System</a>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <?php
        echo ErrorMessage();
        echo SuccessMessage();
    ?>

    <div class="row">
        <div class="offset-sm-3 col-sm-6">
            <div class="card bg-secondary text-light">
                <div class="card-header">
                    <h4>Welcome Back</h4>
                </div>

                <div class="card-body bg-dark">
                    <form action="Login.php" method="post">
                        <div class="form-group">
                            <label for="username"><span class="FieldInfo">Username:</span></label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username"><span class="FieldInfo">Password:</span></label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button class="btn btn-success mt-2" name="Submit">Submit</button>
                        <br>
                        <a href="Admins.php" style="float: right;">No account? <br> Register now!!</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>