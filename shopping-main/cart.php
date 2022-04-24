<?php 
include 'config.php';
include 'header.php'; 

?>


<div class="product-cart-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 clearfix">
                <h2 class="text-center py-2">My Cart</h2>
                <?php
                if (isset($_COOKIE['user_cart'])) {
                    $pid = json_decode($_COOKIE['user_cart']);
                    if (is_object($pid)) {
                        $pid = get_object_vars($pid);
                    }
                    $pids = implode(',', $pid);
                    $db = new Database();
                    $db->select('products', '*', null, 'product_id IN (' . $pids . ')', null, null);
                    $result = $db->getResult();
                    if (count($result) > 0) { ?>
                        <table class="table table-bordered">
                            <thead>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th width="120px">Product Price</th>
                                <th width="100px">Qty.</th>
                                <th width="100px">Sub Total</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $row) { ?>
                                    <tr class="item-row">
                                        <td><img src="product-images/<?php echo $row['featured_image']; ?>" alt="" width="70px" /></td>
                                        <td><?php echo $row['product_title']; ?></td>
                                        <td><span class="product-price"><?php echo $row['product_price']; ?> <span>TK</span></span></td>
                                        <td>
                                            <input class="form-control item-qty" type="number" value="1" />
                                            <input type="hidden" class="item-id" value="<?php echo $row['product_id']; ?>" />
                                            <input type="hidden" class="item-price" value="<?php echo $row['product_price']; ?>" />
                                        </td>
                                        <td> <span class="sub-total"><?php echo $row['product_price']; ?> <span>TK</span></span></td>
                                        <td>
                                            <a class="btn btn-sm btn-secondary remove-cart-item" href="" data-id="<?php echo $row['product_id']; ?>"><i class="fa fa-remove"></i></a>
                                        </td>
                                    </tr>
                                <?php    } 
                                
                                
                                ?>
                                <tr>
                                    <td colspan="5" align="right"><b>TOTAL AMOUNT (TK)</b></td>
                                    <td class="total-amount"> </td>
                                </tr>
                            </tbody>
                        </table>
                        <a class="btn btn-sm btn-success text-uppercase" href="<?php echo $hostname; ?>">Continue Shopping</a>
                        <?php if (isset($_SESSION['user_role'])) { ?>

                            <form action="invoice.php" class="checkout-form pull-right" method="POST">
                                <?php
                                $product_id = '';
                                $product_title = "";
                                foreach ($result as $row) {
                                    $product_id .= $row['product_id'] . ',';
                                    $product_title .= $row['product_title'] . ', ';
                                }
                                ?>
                                <input type="hidden" name="product_title" value="<?php echo $product_title; ?>">
                                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                <input type="hidden" name="product_total" class="total-price" value="">
                                <input type="hidden" name="product_qty" class="total-qty" value="">
                                <!--<input type="submit" class="btn btn-md btn-success" value="Proceed to Checkout">-->
                                <button type="button" class="btn btn-md btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Proceed to Checkout
                                </button>
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Confirm Purchase</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="invoice.php" method="post">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username / Email</label>
                                                <input type="text" class="form-control" id="username" name="username" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="number" class="form-control" id="phone" name="phone" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="account" class="form-label">Account Number</label>
                                                <input type="number" class="form-control" id="account" name="account" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="amount" class="form-label">Amount</label>
                                                <input type="number" class="form-control" id="amount" name="amount" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="transaction" class="form-label">Transaction No. / ID</label>
                                                <input type="number" class="form-control" id="transaction" name="transaction" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="payment" class="form-label">Payment Method</label>
                                                <select type="select" class="form-control" id="payment" name="payment">
                                                    <option>Bkash</option>
                                                    <option>Nagad</option>
                                                    <option>Rocket</option>
                                                </select>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                            </form>
                        <?php } else { ?>
                            <a class="btn btn-sm btn-success text-uppercase pull-right" href="./pleaseLogin.php">Proceed to Checkout</a>
                        <?php } ?>
                    <?php   }
                    
                } else { ?>
                    <div class="fs-3 text-muted  d-flex justify-content-center align-items-center" style="min-height: 200px">
                        Your cart is currently empty.
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>





<?php include 'footer.php'; ?>