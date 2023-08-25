<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="file_upload.php" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="submit">
    </form>
</body>
</html>

<?php


if(isset($_POST["submit"])) {

    echo $file_name = $_FILES['file']['name'];
    echo $tmp_path = $_FILES['file']['tmp_name'];
    echo $file_size = $_FILES['file']['size'];
    echo $file_type = pathinfo($file_name,PATHINFO_EXTENSION);
    
    if(file_exists('upload/'.$file_name)) {
        echo "file exists";
    }
    if(move_uploaded_file($tmp_path, 'upload/'.$file_name)){
        echo 'uploaded.';
    }
}