<?php

    if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
        die('You are not logged in!');
    }
    if($_SESSION['role'] === 1) {
        die('You do not have permission to watch this page!');
    }

?>

<!DOCTYPE html>

<html lang="en">
<head>

    <?php include("Views/Common/headings.php") ?>

    <title>Gameder - AdminPanel</title>
    <link rel="stylesheet" href="Public/css/home.css">
    <link rel="stylesheet" href="Public/css/navbar.css">
    <link rel="stylesheet" href="Public/css/admin.css">

    <script src="Public/js/admin.js"></script>

</head>

<body>

    <style type="text/css">
        body {
            background-image: url('Public/img/background2.jpeg');
        }
    </style>

    <?php include("Views/Common/navbar.php") ?>

    <div class="container text-center">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-12"></div>
            <div class="not-empty col-lg-10 col-md-10 col-sm-12">
                <table>
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><?= $user->getId(); ?></td>
                            <td><?= $user->getName(); ?></td>
                            <td><?= $user->getEmail(); ?></td>
                            <td><?= $user->getRole(); ?></td>
                            <td><button id="btn" onclick="location.href='?page=logout'">Logout</button></td>
                        </tr>

                    </tbody>
                    <tbody class="users-list">
                    </tbody>
                </table>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12"></div>
        </div>
    </div>

    <br>

    <div class="get-users text-center">
        <button onclick="getAllUsers()">Get all users</button>
    </div>



    <?php include("Views/Common/footer.php") ?>

</body>
</html>
