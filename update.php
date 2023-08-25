<?php

session_start();

if (empty($_SESSION['session_email'])) {
    header('location: ./index.html');
}

require_once 'config.php';

if (isset($_GET['guid'])) {
    $guid = $_GET["guid"];
    $sql = "select * from users where guid = '{$guid}'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $json_rows[] = $row;
        }
        $json_data['data'] = $json_rows;
        $json_data['status'] = true;
        echo json_encode($json_data);
    } else {
        $json_data['status'] = false;
        $json_data['msg'] = "Data not found.";
        echo json_encode($json_data);
    }
}

if(isset($_POST['email'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "update `users` set `email` = '{$email}', `password` = '".md5($password)."' where `guid` = '{$_POST['guid']}'";
    $result = $conn->query($sql);
    if($result) {
        $json_data['status'] = true;
        $json_data['msg'] = "Record updated";
        echo json_encode($json_data);
    } else {
        $json_data['status'] = false;
        $json_data['msg'] = "Record updation failed.";
        echo json_encode($json_data);
    }

}