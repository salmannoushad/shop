<?php
// include header file
include 'header.php'; ?>
<div class="d-flex justify-content-center" style="height: 75vh;">
    <div class='w-50 d-flex justify-content-center align-items-center'>
        <div class="card w-75 p-2">


            <h3 class="text-center text-uppercase pt-3">Add New Category</h3>

            <!-- Form -->
            <div>
                <form id="createCategory" class="add-post-form" method="POST">
                    <div class="form-group ">
                        <label>Category Name</label>
                        <input type="text" name="cat" class="form-control category" placeholder="Category Name" required />
                    </div>
                    <div class='d-flex justify-content-center'>

                        <input type="submit" name="save" class="btn btn-secondary my-2 text-uppercase" value="Submit">
                    </div>
                </form>
            </div>
            <!-- /Form -->
        </div>
    </div>
</div>
<?php
//    include footer file
include "footer.php";
?>