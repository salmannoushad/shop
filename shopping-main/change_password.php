<?php
include 'config.php';
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'user') {
    include 'header.php'; ?>
    <div id="user_profile-content">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="w-50">
                    <?php
                    //if(isset($_GET['user'])) {
                    $user = $_SESSION['user_id'];
                    $db = new Database();

                    $db->select('user', 'username', null, "user_id = '{$user}'", null, null);
                    $result = $db->getResult();
                    if (count($result) > 0) {
                    ?>

                        <div class="signup_form p-2 border border-dark my-2">
                            <h2 class="text-center mt-1">Change Password</h2>
                            <!-- Form -->
                            <form id="modify-password" method="POST">
                                <?php foreach ($result as $row) { ?>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $row['username']; ?>" requried />
                                    </div>
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="old_pass" class="form-control old_pass" placeholder="Enter Old Password" requried />
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="new_pass" class="form-control new_pass" placeholder="Enter New Password" requried />
                                    </div>
                                    <div class="text-center">

                                        <input type="submit" name="submit" class="btn btn-success my-2" style="width:100px" value="Submit" />
                                    </div>
                                <?php } ?>
                            </form>
                            <!-- /Form -->
                        </div>
                    <?php
                    }
                    //}else{
                    //   header("location: {$hostname}/user_profile.php");
                    //  ob_flush();
                    //}
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php';
}
?>