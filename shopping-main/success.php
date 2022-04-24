<?php
include 'config.php';
session_start(); ?>
<?php
if (($_GET['payment_request_id'] == $_SESSION['TID']) && $_GET['payment_status'] == 'Credit') {
	$title = 'Payment Successful';
	$response = '<div class=" ">
				  	<i class="fa fa-check-circle text-success"> <h3>Payment Successful</h3></i>
				    
				    <p>Your Product Will be Delivered within 2 to 3 days.</p>
				  	<a href=" ./user_orders.php" class="btn btn-md btn-primary">Track Your Order</a>
				  </div>';

	// reduce purchased quantity from products
	$db = new Database();
	$db->select('order_products', 'product_id,product_qty', null, "pay_req_id ='{$_GET['payment_request_id']}'", null, null);
	$result = $db->getResult();
	$products = array_filter(explode(',', $result[0]['product_id']));
	$qty = array_filter(explode(',', $result[0]['product_qty']));
	for ($i = 0; $i < count($products); $i++) {
		$db->sql("UPDATE products SET qty = qty - '{$qty[$i]}' WHERE product_id = '{$products[$i]}'");
	}
	$res = $db->getResult();


	// remove cart items
	if (isset($_COOKIE['user_cart'])) {
		setcookie('cart_count', '', time() - (180), '/', '', '', TRUE);
		setcookie('user_cart', '', time() - (180), '/', '', '', TRUE);
	}
} else {
	$title = 'Payment UnSuccessful';
	$response = '<div class="">
				    
				  	<i class="fa fa-times-circle text-danger"><h3>Payment Unsuccessful</h3></i>
				  	<a href="' . $hostname . '" class="btn btn-md btn-primary">Continue Shopping</a>
				  </div>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.css">

	<!-- Bootstrap  CDN-->

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- External-CSS -->
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<div class="  text-center  p-1" style="height: 50vh; ">




		<?php echo $response; ?>




	</div>
</body>

</html>