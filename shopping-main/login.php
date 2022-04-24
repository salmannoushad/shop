<?php
include 'config.php';

include 'header.php'; ?>

<div id="userLogin_form" class="">

    <div class="modal-body">
        <!-- Form -->
        <form id="loginUser" method="POST" class="">
            <div class="d-flex align-items-center justify-content-center  " style="height: 70vh">
                <div class="border border-dark p-2 my-3 " style="width: 300px;">

                    <h2 class="text-center">Login Here</h2>
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name=' login' class="form-control username" placeholder="Username" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name='login' class="form-control password" placeholder="password" autocomplete="off" required>
                    </div>

                    <div class=" d-flex align-items-center justify-content-center">
                        <input type="submit" name="login" class="btn btn-primary my-2" value="Login" />
                    </div>
                    <p>Don't Have an Account? <a href="register.php" class="text-decoration-none">Register Here</a></p>
                </div>

            </div>
        </form>
        <!-- /Form -->
    </div>
</div>
<?php include 'footer.php';

?>