<?php

// host,user,pass,db
$conn = new mysqli("localhost","root","root","ncrb");

if($conn->connect_error) {
    die('Connect Error('. $conn->connect_errno .')'. $conn->connect_error);
} else {
    echo "Connected Successfully";
}

