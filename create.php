<?php

require_once  "config.php";

if (isset($_POST['email'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (`guid`,`email`,`password`) VALUES ('".uniqid()."','{$email}','".md5($password)."')";
    
    $result = $conn->query($sql);

    if($result){
        echo "Your registration is done. <a href='./login.html'>Click here to login</a>";
    } else {
        echo "error".$sql."<br>".$conn->error;
    }

    $conn->close();
   
}
