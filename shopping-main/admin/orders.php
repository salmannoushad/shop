<?php 
include_once 'header.php';
include_once '../invoice-class.php';

$obj = new Invoice();
$show = $obj->show();
//print_r($show);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <th>Order ID</th>
            <th>Transaction ID</th>
            <th>Username</th>
            <th>Phone No.</th>
            <th>Account No.</th>
            <th>Address</th>
            <th>Products</th>
            <th>Total Cost</th>
        </thead>

        <tbody>
            <?php 
                foreach($show as $v){ 
            ?>
                <tr>
                    <td> <?php echo $v['id']?> </td>
                    <td> <?php echo $v['transaction_id']?> </td>
                    <td> <?php echo $v['username']?> </td>
                    <td> <?php echo $v['phone']?> </td>
                    <td> <?php echo $v['account']?> </td>
                    <td> <?php echo $v['address']?> </td>
                    <td>
                    <?php
                        $arr = explode(", ", $v['products']);
                        $i  = 1;
                        $c = count($arr);
                        foreach($arr as $a){
                            echo $a;
                            $i++;
                            if($i<$c){
                                echo "<br>";
                            }
                        }
                    ?> 
                    </td>
                    <td> <?php echo $v['total_cost']?> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>