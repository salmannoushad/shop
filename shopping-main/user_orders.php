<?php
include_once 'config.php';
include_once 'header.php';
include_once 'invoice-class.php';

if (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'user') {



$obj = new Invoice();
$username = $obj->show_user_table($_SESSION['user_id']);
//print_r($username['username']);
$show = $obj->show_user_order($username['username']);
//print_r($show);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLA</title>
</head>
<body>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <th>SL</th>
            <th>Products</th>
            <th>Total Cost</th>
        </thead>

        <tbody>
            <?php 
                $sl = 1;
                foreach($show as $v){ 
            ?>
                <tr>
                    <td><?php echo $sl++ ?></td>
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
<?php include 'footer.php';
} else {
    //header("Location: " . $hostname);
}
?>