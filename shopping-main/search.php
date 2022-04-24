<?php
include 'config.php';
if ($_GET['search'] == '') {
    header("Location: " . $hostname);
} else {
    $db = new Database();
    $db->select('options', 'site_title', null, null, null, null);
    $result = $db->getResult();
    if (!empty($result)) {
        $title = $result[0]['site_title'];
    } else {
        $title = "Shopping Project";
    }
    include 'header.php';  ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Search Results</h2>
            </div>
        </div>

        <div class="col-md-3">
            <?php
            $db = new Database();
            $search = $db->escapeString($_GET['search']);
            $db->sql('SELECT sub_categories.sub_cat_id,sub_categories.sub_cat_title FROM products
                            LEFT JOIN sub_categories ON products.product_cat = sub_categories.cat_parent
                            WHERE products.product_title LIKE "%' . $search . '%"');
            $result = $db->getResult();  ?>

        </div>

        <div class="d-flex gap-4 flex-wrap justify-content-center align-items-center my-3">
            <?php
            $limit = 8;
            $db->select('products', '*', null, "product_title LIKE '%{$search}%'", null, $limit);
            $result3 = $db->getResult();
            if (count($result3) > 0) {
                foreach ($result3 as $row3) {
            ?>
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
                                <a class='text-decoration-none' href="single_product.php?pid=<?php echo $row3['product_id']; ?>"><?php echo substr($row3['product_title'], 0, 25), '...'; ?></a>
                            </h6>
                            <div class="text-center"><?php echo $cur_format; ?> <?php echo $row3['product_price']; ?></div>
                        </div>
                    </div>

                <?php
                }
            } else {
                ?>
                <div class="text-center"> Result Not Found </div>
            <?php } ?>
            <div class="pagination-outer">
                <?php
                echo $db->pagination('products', null, "product_title LIKE '%{$search}%'", $limit);
                ?>
            </div>
        </div>
    </div>

<?php include 'footer.php';
} ?>