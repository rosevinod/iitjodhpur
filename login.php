<?php
require_once 'config.php';

$error = array();
$res = array();

if (empty($_POST['email'])) {
    $error[] = "Email field is required.";
}

if (empty($_POST['password'])) {
    $error[] = " Password field is required.";
}
if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $error[] = " Enter Valid Email address.";
}

if (count($error) > 0) {
    $resp['msg'] = $error;
    $resp['status'] = false;
    echo json_encode($resp);
    exit;
}

$sql = "select * from users where email = '{$_POST['email']}' AND password = '".md5($_POST['password'])."'";

$result = $conn->query($sql);
$conn->close();

if ($result->num_rows > 0) {
    session_start();
    $_SESSION['session_email'] = $_POST['email'];
    $resp['redirect'] = "dashboard.php";
    $resp['status'] = true;
    echo json_encode($resp);
    exit;
} else {
    $error[] = "Invalid details.";
    $error[] = " Enter valid details.";
    $resp['msg'] = $error;
    $resp['status'] = false;
    echo json_encode($resp);
    exit;
}

