<?php
include_once 'php_files/config.php';
//checking session
session_start();
if (isset($_SESSION['admin_name'])) {
    header("Location: " . $base_url . "admin/dashboard.php");
}
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin : Shoopping</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <!-- Bootstrap  CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div>
        <div class="d-flex align-items-center justify-content-center bg-success " style="height: 100vh">
            <div class="border border-secondary p-2 my-5" style="width: 300px;">
                <h1 class="text-center text-light">Admin Login</h1>
                <!-- Form -->
                <form id="adminLogin" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label class="">Username</label>
                        <input type="text" class="form-control username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label class="">Password</label>
                        <input type="password" class="form-control password" placeholder="password" required>
                    </div>
                    <div class=" d-flex align-items-center justify-content-center">
                        <input type="submit" name="login" class="btn btn-light my-3 " value="Login" />
                    </div>
                </form>
                <!-- /Form -->
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/admin_actions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>