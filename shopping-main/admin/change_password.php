<!-- include header file -->
<?php include 'header.php'; ?>
<div class=" my-5 " style="min-height: 70vh;">
    <h2 class="text-center text-uppercase pt-2">Set New Password</h2>
    <!-- Form -->
    <div class="row justify-content-center">
        <form id="changePassword" class="add-post-form col-md-6" method="POST">
            <div class="form-group">
                <label>Old Password</label>
                <input type="password" name="old_pass" class="form-control old_pass" placeholder="Old Password" required />
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_pass" class="form-control new_pass" placeholder="New Password" required />
            </div>
            <input type="submit" name="save" class=" btn btn-primary add-new my-2" value="Submit">
        </form>
    </div>
    <!-- /Form -->
</div>
<?php include "footer.php";   ?>