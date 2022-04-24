<?php
include 'php_files/config.php';
if (!session_id()) {
    session_start();
}
if (!isset($_SESSION['admin_name'])) {
    header("location:{$base_url}/admin");
}

$db = new Database();
$db->select('options', 'site_name,site_logo,currency_format');
$result = $db->getResult();
// $currency_format = $result[0]['currency_format'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin : E-Shop</title>
    <!-- Bootstrap  CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900|Montserrat:400,500,700,900" rel="stylesheet">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Jquery textEditor -->
    <link rel="stylesheet" href="css/jquery-te-1.4.0.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="./style.css">
    <!-- <link rel="stylesheet" href="../style.css"> -->

</head>

<body>
    <!-- HEADER -->


    <div class=" container-expand bg-dark py-3" id="admin-header">
        <div class="d-flex container justify-content-between " id="admin-menu">
            <a href="index.php" class=" fw-bold text-decoration-none fs-5 text-white">ADMIN-PANEL</a>
            <div class="mt-1 d-flex text-uppercase">

                <li <?php if (basename($_SERVER['PHP_SELF']) == "dashboard.php") echo 'class="active"'; ?>><a class="text-decoration-none nav-menu " href="dashboard.php">Dashboard</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == "products.php") echo 'class="active"'; ?>><a class="text-decoration-none nav-menu " href="products.php">Products</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == "category.php") echo 'class="active"'; ?>><a class="text-decoration-none nav-menu " href="category.php">Categories</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == "sub_category.php") echo 'class="active"'; ?>><a class="text-decoration-none nav-menu " href="sub_category.php">Sub-Categories</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == "brands.php") echo 'class="active"'; ?>><a class="text-decoration-none nav-menu " href="brands.php">Brands</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == "orders.php") echo 'class="active"'; ?>><a class="text-decoration-none nav-menu " href="orders.php">Orders</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == "users.php") echo 'class="active"'; ?>><a class="text-decoration-none nav-menu " href="users.php">Users</a></li>
            </div>

            <div class="dropdown ">
                <button href="" class="dropdown-toggle logout text-dark text-decoration-none btn btn-light btn-sm" data-bs-toggle="dropdown">
                    <?php
                    if (!session_id()) {
                        session_start();
                    }
                    echo 'Hi ' . $_SESSION['admin_name']; ?>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
                    <li><a class="dropdown-item" href="php_files/logout.php">Logout</a></li>
                </ul>
            </div>

        </div>





    </div>

    <!-- /HEADER -->


    <div id="admin-wrapper">
        <div class="container">