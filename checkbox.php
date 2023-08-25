<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkbox radio select</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    </style>
</head>


<?php

if (isset($_POST['submit'])) {
    echo 'yes, submit';
    echo '<br>select<br>';
    print_r($_POST['select-items']);
    echo '<br>select multi<br>';
    print_r($_POST['select-multiple-items']);
    echo '<br>select checkbox<br>';
    print_r($_POST['checkbox-names']);
    echo '<br>select radio<br>';
    print_r($_POST['radio-names']);

    exit();
}
$raw_data = file_get_contents("https://reqres.in/api/users?page=2");

//print "<pre>"; print_r($raw_data);print "</pre>"; 

$json_data = json_decode($raw_data, true);

?>


<body class="container">

    <div class="card">
        <div class="card-header">Testing of checkboxs</div>
        <div class="card-body">
            <form method="post" action="./checkbox.php">

                <?php
                // select
                
                echo "<select class=\"form-select\" name='select-items'>";
                foreach ($json_data["data"] as $json_array) {
                    echo "<option value='{$json_array['first_name']}'>{$json_array['first_name']}</option>";
                }
                echo "</select>";

                echo '<hr>';

                // select multiple
                
                echo "<select class=\"form-select\" name='select-multiple-items[]' multiple>";
                foreach ($json_data["data"] as $json_array) {
                    echo "<option value='{$json_array['first_name']}'>{$json_array['first_name']}</option>";
                }
                echo "</select>";

                echo '<hr>';
                // checkbox
                
                foreach ($json_data["data"] as $json_array) {
                    echo "<input class=\"form-check-input\" type='checkbox' name='checkbox-names[]' value='{$json_array['first_name']}'>&nbsp;{$json_array['first_name']}&nbsp;</input>";
                }

                echo '<hr>';
                foreach ($json_data["data"] as $json_array) {
                    echo "<input class=\"form-check-input\" type='radio' name='radio-names' value='{$json_array['first_name']}'>&nbsp;{$json_array['first_name']}&nbsp;</input>";
                }

                // echo "<pre>";
                // print_r($json_data["data"]);
                // echo "</pre>";
                
                ?>
                <hr>
                <button class="btn btn-info" name="submit">submit</button>
            </form>
        </div>
    </div>
</body>

</html>