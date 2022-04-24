<?php include 'config.php'; ?>
<?php include 'header.php'; ?>

<div class="product-section content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <h2 class="text-center">Popular Products</h2>

                <div class="d-flex gap-4 flex-wrap justify-content-center align-items-center my-3">
                    <?php
                    $limit = 8;
                    $db = new Database();
                    $db->select('products', '*', null, 'product_status = 1 AND qty > 0', 'product_id DESC', $limit);
                    $result = $db->getResult();
                    if (count($result) > 0) {
                        foreach ($result as $row) { ?>
                            <div class="card" style="width: 18rem;">

                                <a class="card-body" href="single_product.php?pid=<?php echo $row['product_id']; ?>">
                                    <img class="card-img-top card-image" src="product-images/<?php echo $row['featured_image']; ?>">
                                </a>

                                <div class="btn-group">
                                    <a href="single_product.php?pid=<?php echo $row['product_id']; ?>"><i class="fa fa-eye text-dark fa-xl "></i></a>
                                    <a href="" class="add-to-cart" data-id="<?php echo $row['product_id']; ?>"><i class="fa fa-shopping-cart text-dark fa-xl"></i></a>
                                    <a href="" class="add-to-wishlist" data-id="<?php echo $row['product_id']; ?>"><i class="fa fa-heart text-dark fa-xl"></i></a>
                                </div>

                                <div class="card-footer">
                                    <h6 class="card-title text-center">
                                        <a class='text-decoration-none' href="single_product.php?pid=<?php echo $row['product_id']; ?>"><?php echo substr($row['product_title'], 0, 25), '...'; ?></a>
                                    </h6>
                                    <div class="text-center"><?php echo $cur_format; ?> <?php echo $row['product_price']; ?></div>
                                </div>
                            </div>
                    <?php    }
                    } ?>
                </div>
            </div>
            <div class="">
                <div class="pagination  justify-content-center mt-2">
                    <?php echo $db->pagination('products', null, 'product_views > 0 AND product_status = 1 AND qty > 0', $limit); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>