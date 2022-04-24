<?php 
    include_once 'config.php';
    include_once 'header.php';
    include_once 'invoice-class.php';

    
    $obj = new Invoice();
    //print_r($obj->show());
    echo "<pre>";
    //print_r($_POST);
    echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Invoice</title>

    <style>
        table,th,td{
            justify-content: center;
            text-align: center;
            font-size: 25px;
            margin-left: auto;
            margin-right: auto;
            border: 2px solid black;
            padding: 15px;
        }
        button{
            font-size: 30px;
        }
    </style>
</head>
<body>

<div style="justify-content:center; text-align:center;">
    <h1>Invoice</h1><br>

    <table>
    <tr>
        <th>Transaction No.</th>
        <td><?php echo $_POST['transaction'] ?></td>
    </tr>
    <tr>
        <th>Username</th>
        <td><?php echo $_POST['username'] ?></td>
    </tr>
    <tr>
        <th>Phone Number</th>
        <td><?php echo $_POST['phone'] ?></td>
    </tr>
    <tr>
        <th>Account Number</th>
        <td><?php echo $_POST['account'] ?></td>
    </tr>
    <tr>
        <th>Address</th>
        <td><?php echo $_POST['address'] ?></td>
    </tr>
    <tr>
        <th>Total Cost</th>
        <td><?php echo $_POST['amount'] ?></td>
    </tr>
    <tr>
        <th>Products</th>
        <td><?php
        $product_arr = explode(", ", $_POST['product_title']);
        $i = 1;
        $c = count($product_arr);
        foreach($product_arr as $v){
            echo $v;
            $i++;
            if($i<$c){
                echo "<br>";
            }
        }
         ?></td>
    </tr>

    <!--<th>Products : <br><br><?php //echo $_POST['product_title'] ?></th>-->
    </table>
    <br><br>
    <form action="invoice-store.php" method="post">
        <input type="hidden" name="transaction_id" value="<?php echo $_POST['transaction'] ?>" />
        <input type="hidden" name="username" value="<?php echo $_POST['username'] ?>" />
        <input type="hidden" name="phone" value="<?php echo $_POST['phone'] ?>" />
        <input type="hidden" name="account" value="<?php echo $_POST['account'] ?>" />
        <input type="hidden" name="address" value="<?php echo $_POST['address'] ?>" />
        <input type="hidden" name="total_cost" value="<?php echo $_POST['amount'] ?>" />
        <input type="hidden" name="products" value="<?php print_r($_POST["product_title"]) ?>" />
        <button class="btn btn-md btn-success" type="submit" style="font-size: 30px;">Done</button>
    </form>
    
</div>

    
    
    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php include 'footer.php'; ?>
</body>
</html>