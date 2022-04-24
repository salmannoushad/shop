<?php
// include header file
include 'header.php'; ?>
<div class="container bg-secondary" style="height: 75vh" >
    <h2 class="text-center text-uppercase my-4">Dashboard</h2>
    <div class="col">
        <!-- <div class="col-md-12">
            <?php
            $db = new Database();
            $db->select('products', 'product_id', null, 'qty < 1', null, 0);
            $qty = $db->getResult();
            if (!empty($qty)) {  ?>
                <table class="table table-bordered">
                    <thead>
                        <tr class="active">
                            <td colspan="2">Out Of Stock</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($qty as $q) { ?>
                            <tr>
                                <td>Product Code</td>
                                <td><?php echo 'PDR00' . $q['product_id']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div> -->
    </div>

    <div class="d-flex justify-content-evenly mt-5 flex-wrap gap-5 ">

        <a class="text-decoration-none w-25" href="./products.php">

            <div class=" card  border-2 border-info bg-dark text-light fs-4 text-uppercase fw-bold text-center">
                <?php
                $db = new Database();
                $db->select('products', 'COUNT(product_id) as p_count', null, null, null, 0);
                $products = $db->getResult();
                ?>
                <div class="d-flex justify-content-center align-items-center text-center" style="height: 15vh;">


                    <span class="mx-1"><?php echo $products[0]['p_count']; ?></span>
                    <span>Products</span>

                </div>
            </div>


        </a>


        <a class="text-decoration-none w-25" href="./category.php">

            <div class=" card  border-2 border-dark bg-secondary text-light fs-4 text-uppercase fw-bold text-center">
                <?php
                $db = new Database();
                $db->select('categories', 'COUNT(cat_id) as c_count', null, null, null, 0);
                $category = $db->getResult();
                ?>
                <div class="d-flex justify-content-center align-items-center text-center" style="height: 15vh;">
                    <span class="mx-1"><?php echo $category[0]['c_count']; ?></span>
                    <span class="count-tag">Categories</span>
                </div>
            </div>


        </a>

        <a class="text-decoration-none w-25" href="./sub_category.php">

            <div class=" card  border-2 border-danger bg-success text-light fs-4 text-uppercase fw-bold text-center">
                <div class="d-flex justify-content-center align-items-center text-center" style="height: 15vh;">
                    <?php
                    $db = new Database();
                    $db->select('sub_categories', 'COUNT(sub_cat_id) as sub_count', null, null, null, 0);
                    $sub_category = $db->getResult();
                    ?>
                    <span class="mx-1"><?php echo $sub_category[0]['sub_count']; ?></span>
                    <span class="count-tag">Sub Categories</span>
                </div>
            </div>


        </a>

        <a class="text-decoration-none w-25" href="./brands.php">

            <div class=" card  border-2 border-info bg-dark text-light fs-4 text-uppercase fw-bold text-center">
                <div class="d-flex justify-content-center align-items-center text-center" style="height: 15vh;">
                    <?php
                    $db = new Database();
                    $db->select('brands', 'COUNT(brand_id) as b_count', null, null, null, 0);
                    $brands = $db->getResult();
                    ?>
                    <span class="mx-1"><?php echo $brands[0]['b_count']; ?></span>
                    <span class="count-tag">Brands</span>
                </div>
            </div>

        </a>

        <a class="text-decoration-none w-25" href="./orders.php">

            <div class=" card  border-2 border-dark bg-secondary text-light fs-4 text-uppercase fw-bold text-center">
                <div class="d-flex justify-content-center align-items-center text-center" style="height: 15vh;">
                    <?php
                    $db = new Database();
                    $db->select('order_products', 'COUNT(order_id) as o_count', null, null, null, 0);
                    $orders = $db->getResult();
                    ?>
                    <span class="mx-1"><?php echo $orders[0]['o_count']; ?></span>
                    <span class="count-tag">Orders</span>
                </div>
            </div>
        </a>

        <a class="text-decoration-none w-25" href="./users.php">

            <div class=" card  border-2 border-danger bg-success text-light fs-4 text-uppercase fw-bold text-center">
                <div class="d-flex justify-content-center align-items-center text-center" style="height: 15vh;">
                    <?php
                    $db = new Database();
                    $db->select('user', 'COUNT(user_id) as u_count', null, null, null, 0);
                    $users = $db->getResult();
                    ?>
                    <span class="mx-1"><?php echo $users[0]['u_count']; ?></span>
                    <span class="count-tag">Users</span>
                </div>
            </div>
        </a>

    </div>

</div>
<?php
//    include footer file
include "footer.php";

?>