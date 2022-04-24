<?php include 'config.php'; ?>
<?php include 'header.php'; ?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center py-2">My Wishlist</h2>
            <?php
            if (isset($_COOKIE['user_wishlist']) && !empty($_COOKIE['user_wishlist'])) {
                $pid = array();
                $pid = json_decode($_COOKIE['user_wishlist']);
                if (is_object($pid)) {
                    $pid = get_object_vars($pid);
                }
                $pids = implode(',', $pid);
                $db = new Database();
                $db->select('products', '*', null, "product_id IN ({$pids})", null, null);
                $result = $db->getResult();
                if (count($result) > 0) { ?>
                    <table class="table table-bordered">
                        <thead>
                            <th width="150px">Product Image</th>
                            <th>Product Name</th>
                            <th width="150px">Product Price</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row) { ?>
                                <tr>
                                    <td><img src="product-images/<?php echo $row['featured_image']; ?>" alt="" width="100px" /></td>
                                    <td><?php echo $row['product_title']; ?></td>
                                    <td><?php echo $cur_format; ?> <?php echo $row['product_price']; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-secondary remove-wishlist-item" href="" data-id="<?php echo $row['product_id']; ?>"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>

                            <?php    } ?>
                        </tbody>
                    </table>
                    <a class="btn btn-sm btn-primary proceed-to-cart text-uppercase" href="javascript:void(0)">Add to Cart</a>
                <?php    }
            } else { ?>
                <div class="fs-3 text-muted   d-flex justify-content-center align-items-center" style="min-height: 200px">
                    No products were added to the wishlist.
                </div>

            <?php } ?>


            <?php //} 
            ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>