<?php
function dd($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die;
}

$mysqli = new mysqli('localhost', 'root', '', 'dbcrud') or die(mysqli_error($mysqli));
$update = false;
$id = 0;
$fname = $lname = $timestamp = $extcheck = $imge = $errmsg = '';

//saving inputs
if (isset($_POST['save'])) { //bad solution but its working for now 
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $timestamp = $_POST['timestamp'];
    // $img = $_FILES['imge']['name'];  
    date_default_timezone_set('Asia/Tashkent'); // to another file 
    $timestamp = date("Y-m-d H:i:s"); // to another file

    $memtypes = [
        "jpeg",
        "jpg",
        "png",
        "gif"
    ];
    //$uploads_dir = 'uploads/'; // for now, the place where the files will be saved TODO a static class 
    $image_name = $_FILES['imge']['name'];
    $temp_name = $_FILES['imge']['tmp_name'];
    $image_file = $uploads_dir . $image_name;

    $pathcheck = pathinfo($image_file, PATHINFO_EXTENSION);
    if (!in_array($pathcheck, $memtypes)) {
        return;
    } else {
        $errmsg = "errrrrrrrrrrrrrrror";
    }

    if (!$mysqli->query("INSERT into data (fname, lname, created_at, extentions, file_name) VALUES('$fname', '$lname', '$timestamp', '$extcheck', '$image_name') ")) {
        dd(mysqli_error($mysqli));
    }

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: crud.php");
}


//delete 
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM data WHERE id=$id") or die(mysqli_error($mysqli));

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: crud.php");
}
//edit for admins
// extentions for admins
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die(mysqli_error($mysqli));

    if (count($result) == 1) {
        $row = $result->fetch_array();
        $fname = $row['fname'];
        $lname = $row['lname'];
    }
}
//update throught update button
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    $mysqli->query("UPDATE data SET fname='$fname', lname='$lname' WHERE id=$id") or die(mysqli_error($mysqli));

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("location: crud.php");
}
