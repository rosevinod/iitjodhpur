<?php

$url = "https://reqres.in/api/users?page=2";
$data = file_get_contents($url);
print "<pre>"; 
//var_dump (json_decode($data)); 
$json_data = json_decode($data, true);
foreach($json_data['data'] as $json){
    echo $json['email'].'<br>';
}
print($data) ;
print "</pre>";

//file_put_contents("store.json",$data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <select>
    <?php
    foreach($json_data['data'] as $json){
        echo "<option value='{$json['email']}'>{$json['email']}</option>";
        // echo '<input type="checkbox" name="email" value="'.$json["email"].'">'.$json["email"].'<br>';
    }
    ?>
    </select>
</body>
</html>