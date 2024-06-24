<?php require_once("Db.php"); ?>
<?php
function redirect_to($new_loc)
{
    header("Location:" . $new_loc);
    exit;
}

function checkAdmin($Admin)
{
    global $conn;
    $sql = "SELECT username FROM admin WHERE username=:admin";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":admin", $Admin);
    $stmt->execute();
    $result = $stmt->rowCount();
    if ($result == 1) {
        return true;
    } else {
        return false;
    }
}

function FetchAcc($Username, $Password)
{
    global $conn;
    $sql = "SELECT * FROM admin WHERE username = :username AND password = :password LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":username", $Username);
    $stmt->bindValue(":password", $Password);
    $stmt->execute();
    $result = $stmt->rowCount();
    if ($result == 1) {
        return $FoundAcc=$stmt->fetch();
    } else {
        return null;
    }
}
?>