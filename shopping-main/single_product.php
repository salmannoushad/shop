<?php include 'config.php';  //config file
$p_id = $_GET['pid'];
$db = new Database();
$db->sql("UPDATE products SET product_views=product_views+1 WHERE product_id=" . $p_id);
$res = $db->getResult();
$db->select('products', '*', null, "product_id= '{$p_id}'", null, null);
$single_product = $db->getResult();
if (count($single_product) > 0) {
    $title = $single_product[0]['product_title'];   //set dynamic header
    // include header
    include 'header.php'; ?>
    <div class="container">

        <div class="row py-5">
            <?php foreach ($single_product as $row) { ?>
                <!-- <div class="col-md-2"></div> -->
                <div class="col-md-4">
                    <div class="mx-auto" style="width: 200px;">
                        <img id="product-img" class="img-fluid" src="product-images/<?php echo $row['featured_image'] ?>" alt="" />
                    </div>
                </div>
                <!-- <div class="col-md-1"></div> -->
                <div class="col-md-8">
                    <div class="mt-3">
                        <h3 class=""><?php echo $row['product_title']; ?></h3>
                        <span class="">
                            <span class='fw-bold'>Price :</span> <?php echo $row['product_price']; ?> <span>TK</span>
                        </span>
                        <p class="">
                        <h5>Description :</h5><?php echo html_entity_decode($row['product_desc']); ?></p>

                         
                        <?php if (isset($_SESSION['user_role'])) { ?>
                        <button class="add-to-cart btn btn-sm btn-outline-success text-uppercase" data-id="<?php echo $row['product_id']; ?>">Add To Cart</button>
                        <?php } ?>
                        <button class="add-to-wishlist btn btn-sm btn-outline-success text-uppercase" data-id="<?php echo $row['product_id']; ?>">Add To wishlist</button>
                    </div>
                </div>
                <!-- <div class="col-md-2"></div> -->
            <?php   } ?>
        </div>

    </div>

<?php include 'footer.php';
} else {
    echo 'Page Not Found';
}
?>