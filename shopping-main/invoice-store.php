<?php 

include_once 'invoice-class.php';

if(isset($_SESSION['update']))
{
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}
if(isset($_SESSION['error']))
{
    echo $_SESSION['error'];
    unset($_SESSION['update']);
}

$obj = new Invoice();
$obj->store($_POST);
print_r($_POST);
header('location: user_orders.php');