<?php
session_start(); 
require_once './process.php';

$login = $_POST['login'];
$password = $_POST['password']; 
$passwordconfirm = $_POST['passwordconfirm'];
//TODO password incryption
// AND confirmation password!

if ($_POST['password']!== $_POST['passwordconfirm']){
    echo "Your passwords did not match";
} else {
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $register = new insertUser($login, $password);
        $register->inseption();

        echo header('register.php');
    }
}



?>


<!doctype html>
<html lang="en">
  <head>
    <title>Registration</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo '/index.php'; ?>">HOME</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo './login.php'; ?>">CRUD </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo './logout.php'; ?>">Logout</a>
                </li>
        </div>
    </nav>


      <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                        <?php if(isset($message)){  
                        echo '<label class="text-danger">'.$message.'</label>';  
                        }?> 
                <div class="col-10 col-md-8 col-lg-6">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username">Login:</label>
                            <input type="text"  class="form-control username" name="login" required="required" >
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control password" name="password" required="required">
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm Password: </label>
                            <input type="password" class="form-control password" name="passwordconfirm"  required="required">
                        </div>
                            <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                    </form>
                </div>
            </div>
      </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>