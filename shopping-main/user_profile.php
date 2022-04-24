<?php
include 'config.php';
session_start();
if (!isset($_SESSION['user_id']) && $_SESSION['user_role'] != 'user') {
    header("Location: " . $hostname);
}
include 'header.php'; ?>
<div id="user_profile-content">
    <div class="container py-3">
        <div class="d-flex justify-content-center">
            <div class="w-50 border border-dark p-2 mt-5">
                <h2 class="text-center">My Profile</h2>
                <?php
                $user_id = $_SESSION["user_id"];
                $db = new Database();
                $db->select('user', '*', null, "user_id = '{$user_id}'", null, null);
                $result = $db->getResult();
                if (count($result) > 0) {
                    $table = '<table>';
                    foreach ($result as $row) { ?>
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <td><b>First Name </b></td>
                                <td><?php echo $row["f_name"]; ?></td>
                            </tr>
                            <tr>
                                <td><b>Last Name </b></td>
                                <td><?php echo $row["l_name"]; ?></td>
                            </tr>
                            <tr>
                                <td><b>Username </b></td>
                                <td><?php echo $row["username"]; ?></td>
                            </tr>
                            <tr>
                                <td><b>Mobile </b></td>
                                <td><?php echo $row["mobile"]; ?></td>
                            </tr>
                            <tr>
                                <td><b>Address </b></td>
                                <td><?php echo $row["address"]; ?></td>
                            </tr>
                            <tr>
                                <td><b>City </b></td>
                                <td><?php echo $row["city"]; ?></td>
                            </tr>
                        </table>
                <?php }
                }
                ?>
                <div class='text-center'>

                    <a class="btn btn-sm btn-success text-white text-uppercase" href="edit_user.php?user=<?php echo $_SESSION['user_id']; ?>">Update Details</a>
                    <a class="btn btn-sm btn-dark text-white text-uppercase" href="change_password.php">Change Password</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>