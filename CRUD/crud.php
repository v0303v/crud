<?php
session_start(); 
require_once './config.php';

//variables for the form
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname']; 
// $timestamp = $_POST[date('Y-m-d H:i:s')];
$filename = $_POST['filename']; 

//Create
if($_SERVER['REQUEST_METHOD']=='POST'){
    $insertData = new createUser($firstname, $lastname, $filename, $extensions);
    // $insertData->fileCheck($_FILES['filename']['name']);
    $insertData->insertData();
    header('location:./crud.php');
    exit;
}

//Read 
$display = new readUser();
$sql = $display->displayAll();

//Update
$update = new updateUser($firstname, $lastname);
$update->editRecord();

//Delete
$deletion = new deleteUser();
$deletion->deleteRecord();


// if($insertData)
//     {
//         $_SESSION['message'] = "Record has been saved!";
//         header('location: crud.php');
//     }
//     else
//     {
//         $_SESSION['message'] = "Error happened!";
//         header('location: crud.php');
//     }

?>

<!doctype html>
<html lang="en">

<head>
    <title>CRUD</title>
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" idegrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo '/index.php';?>">HOME</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo '../Authentication/login.php';?>">CRUD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo '../Authentication/logout.php';?>">Logout</a>
                </li>
        </div>
    </nav>

        <div class="alert alert-<?php $_SESSION['msg_type'];?>">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last name</th>
                        <th>File Name</th>
                        <th>Created at</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                        <?php 
                        if(isset($sql) && is_array($sql)){
                            foreach($sql as $row){?>
                    <tr>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['file_name']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                            <a href="./crud.php?id=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>
                            <a href="./crud.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>    
                    <?php
                            }
                        }
                        ?>
            </table>
        </div>

        <div class="row justify-content-center">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                        <input type="hidden" name="id" value="">
                    <div class="form-group">
                        <label for="">First Name:</label>
                        <input type="text" name="firstname" class="from-control" value="" placeholder="Enter your first name" required="required">
                    </div>
                    <div class="form-group">
                        <label for="">Last Name:</label>
                        <input type="text" name="lastname" class="from-control" value="" placeholder="Enter your last name" required="required">
                    </div>
                    <div class="form-group">
                        <label for="">Image:</label>
                        <input type="file" name="filename" class="from-control" value="" >
                    </div>
                    <div class="form-group">
                        <?php
                        if ($update == true) {
                        ?>
                            <button type="submit" class="btn btn-info" name="update">Update</button>
                        <?php
                        }else{
                        ?>
                            <button type="submit" class="btn btn-primary" name="save">SAVE</button>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" idegrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" idegrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" idegrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>