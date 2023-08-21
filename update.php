<?php

require_once 'config.php';

if (isset($_GET['guid'])) {
    $guid = $_GET["guid"];
    $sql = "select * from users where guid = '{$guid}'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $json_rows[] = $row;
        }
    }
    $json_data['data'] = $json_rows;
    echo json_encode($json_data);
}