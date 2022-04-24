<?php
$db = new Database();
$db->select('options', 'site_name,site_logo,currency_format');
$header = $db->getResult();

$cur_format = '$';
if (!empty($header[0]['currency_format'])) {
    $cur_format = $header[0]['currency_format'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900|Montserrat:400,500,700,900" rel="stylesheet">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">

    <!-- Bootstrap  CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    <!-- External-CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Shopping</title>


</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-md bg-light navbar-light py-2 fixed-top">
        <div class="container d-flex justify-content-between align-items-center">

            <a href="<?php echo $hostname; ?>" class="navbar-brand fw-bold fs-3 "><span class="brand_name">Shopping</span> </a>

            <form action="search.php" method="GET">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" name='search' placeholder="Search your product">
                    <span class="input-group-btn ">
                        <input class="btn btn-secondary btn-lg " type="submit" value="Search" />
                    </span>
                </div>
            </form>


            <div>
                <ul class="navbar-nav">
                    <div class="dropdown">

                        <li class="nav-item mx-1">
                            <a class="dropdown-toggle text-decoration-none" href="#" data-bs-toggle="dropdown">
                                <?php
                                if (session_status() == PHP_SESSION_NONE) {
                                    session_start();
                                }
                                if (isset($_SESSION["user_role"])) { ?>
                                    Hello <?php echo $_SESSION["username"]; ?><i class="caret"></i>
                                <?php  } else { ?>
                                    <i class="fa fa-user fa-lg p-2 text-dark"></i>
                                <?php  } ?>

                            </a>

                            <ul class="dropdown-menu">
                                <!-- Trigger the modal with a button -->
                                <?php
                                if (isset($_SESSION["user_role"])) { ?>
                                    <li class='dropdown-item'><a href="user_profile.php" class=" text-decoration-none text-dark">My Profile</a></li>
                                    <li class='dropdown-item'><a href="user_orders.php" class=" text-decoration-none text-dark">My Orders</a></li>
                                    <li class='dropdown-item'><a href="javascript:void()" class="user_logout text-decoration-none text-dark">Logout</a></li>
                                <?php  } else { ?>

                                    <li class='dropdown-item'><a class="text-decoration-none text-dark" href="login.php">Login</a></li>
                                    <li class="dropdown-item"><a class="text-decoration-none text-dark" href="register.php">Register</a></li>


                                <?php  } ?>

                            </ul>
                        </li>
                    </div>


                    <li class="nav-item mx-1 ">
                        <a class="text-decoration-none position-relative" href="wishlist.php"><i class="fa fa-heart fa-lg text-dark p-2"></i>
                            <?php if (isset($_COOKIE['wishlist_count'])) {
                                echo '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">' . $_COOKIE["wishlist_count"] . '</span>';
                            } ?>
                        </a>
                    </li>

                    <li class="nav-item mx-1">
                        <a class="text-decoration-none position-relative" href="cart.php"><i class="fa fa-shopping-cart fa-lg text-dark p-2"></i>
                            <?php if (isset($_COOKIE['cart_count'])) {
                                echo '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">' . $_COOKIE["cart_count"] . '</span>';
                            } ?>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- /Modal -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </nav>

    <!-- Ends navbar -->

    <!-- Start Menubar -->

    <nav class="navbar py-0">
        <div class="container-fluid py-3  bg-success ">
            <div class="container d-flex gap-5 justify-content-center ">

                <?php
                $db = new Database();
                $db->select('sub_categories', '*', null, 'cat_products > 0 AND show_in_header = "1"', null, null);
                $result = $db->getResult();
                if (count($result) > 0) {
                    foreach ($result as $res) { ?>
                        <li><a class="text-decoration-none  sub-nav-item" href="category.php?cat=<?php echo $res['sub_cat_id']; ?>"><?php echo $res['sub_cat_title']; ?></a></li>
                <?php    }
                } ?>


            </div>

        </div>
    </nav>

    <!-- Ends Menubar -->