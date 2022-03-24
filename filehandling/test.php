<?php
require_once '../autoload/autoload.php';
use filehandling\File;

$filetmp = $_FILES['filename']['tmp_name'];
$filename = $_FILES['filename']['name'];
$folder = '../uploads/my_txts/';
$filepath = $folder.basename($filename);

if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    
    $files = new File($filetmp);
    $text = $files->openFile(); 

    move_uploaded_file($filetmp, $filepath);   
}

if (isset($_POST['edit'])){
    $text = $_POST['textarea'];

    $write = new File($randomname);
    $text = $write->writeFile($text, $folder);

    header('location: test.php');
}

if (isset($_POST['export'])){
    $file = "test.txt";
    header("Content-type: text/plain");
    header("Content-Disposition: attachment; filename=".$file);

}
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>
        <div class="row align-items-center justify-content-center">
            <form action="?" method="POST" enctype="multipart/form-data">
                <label class="form-label" >File Input:</label>
                <input type="file" name="filename" class="form-control">
                <textarea name="textarea" rows="20" cols="90"><?php echo $text;?> </textarea>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" name="edit" type="submit" value="edit">Edit</button>
                    <button class="btn btn-primary" name="export" type="submit" value="export">Export</button>
                    <button class="btn btn-primary" name="upload" type="submit" value="upload">Upload</button>
                </div>
            </form>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>