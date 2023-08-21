<?php

session_start();

if (empty($_SESSION['session_email'])) {
    header('location: ./index.html');
}

include "config.php";

$sql = "SELECT * FROM users";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>View Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--jqurey 3.7.0 -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/header.js"></script>
    <script type="text/javascript" src="js/footer.js"></script>

</head>

<body class="container">
    <header id="header"></header>
    <div>
        <h2>users</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">GUID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        echo "<tr>";
                        echo "<th scope='row'>{$row['guid']}</th>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['password']}</td>";
                        echo "<td><a class='btn btn-info' href='update.php?guid={$row['guid']}'>Edit</a>&nbsp;<a class='btn btn-danger' href='delete.php?guid={$row['guid']}'>Delete</a></td>";
                        echo "</tr>";
                    }
                }
                ?>

            </tbody>

        </table>

    </div>
    <footer id="footer"></footer>
</body>

</html>