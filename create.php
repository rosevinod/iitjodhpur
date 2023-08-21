<?php

include "config.php";

if(isset($_POST['submit'])){
    echo $email = $_POST['email'];
    echo $password = $_POST['password'];
}