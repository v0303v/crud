<?php
function dd($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die;
}
?>

<?php

$servername = "localhost";
$username = "root";
$serverpassword = "";
$dbname = "dbarf";

$conn = new mysqli($servername, $username, $serverpassword, $dbname);
if ($conn->connect_error) {
    die("connection fail!") . $conn->connect_error;
}

if (isset($_POST['submit'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];

    $insertdata = "INSERT INTO users(login, password) VALUES('$login', '$password')";

    $conn->query($insertdata);

    $_SESSION['success'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}

if (isset($_POST['enter'])) {
    $sql_l = "SELECT * FROM users WHERE login = " . $_POST['llogin'] . " AND password= " . $_POST['lpassword'] . " ";
    $selectl = mysqli_query($conn, $sql_l);

    if ((mysqli_num_rows($selectl)) > 0) {
        header('Location:crud.php');
    } else {
        header('Location:index.php');
    }
}
