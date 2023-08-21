<?php

include "config.php";

if (isset($_GET['guid'])) {

    $user_id = $_GET['guid'];

    $sql = "DELETE FROM `users` WHERE `guid`='$user_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "Record deleted successfully.";
    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}
