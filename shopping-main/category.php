<?php
include 'config.php';

$db = new Database();
$cat = $db->escapeString($_GET['cat']);

$db->select('sub_categories', 'sub_cat_title', null, "sub_cat_id = '{$cat}'", null, null);
$result = $db->getResult();
if (!empty($result)) {
    $title = $result[0]['sub_cat_title'] . ' : Buy ' . $result[0]['sub_cat_title'] . ' at Best Price';
} else {
    $title = "Result Not Found";
}
$page_head = $result[0]['sub_cat_title'];

?>
<?php include 'header.php'; ?>
<div class="container">
    <div class="row">
        <!-- <div class="col-md-12">
            <h2 class="text-center">Laptops</h2>
        </div> -->
        <div class="d-flex gap-4 flex-wrap justify-content-around align-items-center my-3">
            <?php if (!empty($result)) { ?>

                <?php
                $limit = 8;
                $db->select('products', '*', null, "product_sub_cat = '{$cat}' AND product_status = 1 AND qty > 0", null, null);
                $result3 = $db->getResult();
                if (count($result3) > 0) {
                    foreach ($result3 as $row3) { ?>

                        <div class="card" style="width: 18rem;">

                            <a class="card-body" href="single_product.php?pid=<?php echo $row3['product_id']; ?>">
                                <img class="card-img-top card-image" src="product-images/<?php echo $row3['featured_image']; ?>">
                            </a>

                            <div class="btn-group">
                                <a href="single_product.php?pid=<?php echo $row3['product_id']; ?>"><i class="fa fa-eye text-dark fa-xl "></i></a>
                                <a href="" class="add-to-cart" data-id="<?php echo $row3['product_id']; ?>"><i class="fa fa-shopping-cart text-dark fa-xl"></i></a>
                                <a href="" class="add-to-wishlist" data-id="<?php echo $row3['product_id']; ?>"><i class="fa fa-heart text-dark fa-xl"></i></a>
                            </div>

                            <div class="card-footer">
                                <h6 class="card-title text-center">
                                    <a class="text-decoration-none" href="single_product.php?pid=<?php echo $row3['product_id']; ?>"><?php echo substr($row3['product_title'], 0, 25), '...'; ?></a>
                                </h6>
                                <div class="text-center"> <?php echo $row3['product_price']; ?> <span>TK</span></div>
                            </div>
                        </div>
                    <?php    }
                } else { ?>
                    <div class="empty-result">Result Empty</div>
                <?php } ?>
                <div class="col-md-12 pagination-outer">
                    <?php
                    echo $db->pagination('products', null, "product_sub_cat = '{$cat}' AND product_status = 1 AND qty > 0", $limit);
                    ?>
                </div>
        </div>
    </div>
<?php } ?>
</div>


<?php include 'footer.php'; ?>