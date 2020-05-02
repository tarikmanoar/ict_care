<?php include("includes/header.php") ?>
<?php include("includes/preloader.php") ?>
<?php include("includes/top_nav.php") ?>

<!-- End Header -->
<!-- Begin Page Content -->

<?php include("includes/nav.php") ?>
<!-- End Left Sidebar -->
<div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Categories</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item active">Categories</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <!-- End Page Header -->
        <!-- Begin Row -->
        <div class="row">
            <div class="col-xl-4 col-6">
                <div class="widget has-shadow">
                    <div class="widget-body">
                        <?php 

                        if (isset($_POST['submit'])) {
                            $catTile = $_POST['cat_title'];
                            $catPageLink = $_POST['catPageLink'];
                            $catInsert = "INSERT INTO category(title,page_link) VALUES('$catTile','$catPageLink')";
                            $catQuery = query($catInsert);
                            if ($catQuery) {
                                echo"<<script>alert('Data Insert Successfully!')</script>";
                            }else {
                                die("QUERY FAILED!").mysqli_error($dbconn);
                            }
                        }

                        ?>

                        <form class="form-horizontal dropzone" action="" method="post">
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Category Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="cat_title" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Category Link</label>
                                <div class="col-lg-9">
                                    <input type="text" name="catPageLink" class="form-control">
                                </div>
                            </div>


                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label"></label>
                                <div class="col-lg-9">
                                    <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
                                </div>
                            </div>

                        </form>
                    <?php 
                    if (isset($_GET['edit'])) {
                        $id = $_GET['edit'];
                        $selectCat = "SELECT * FROM category WHERE id = '$id'";
                        $catQuery = query($selectCat);
                        $row = mysqli_fetch_assoc($catQuery)
                        ?>
                         <form class="form-horizontal dropzone" action="" method="post">
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Category Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="cat_title" class="form-control" value="<?php echo $row['title']; ?>">
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Category Link</label>
                                <div class="col-lg-9">
                                    <input type="text" name="catPageLink" class="form-control" value="<?php echo $row['page_link']; ?>">
                                </div>
                            </div>


                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label"></label>
                                <div class="col-lg-9">
                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                </div>
                            </div>

                        </form><?php
                        }
                        ?>



                    </div>
                </div>
            </div>



            <div class="col-xl-8 col-6">
                <div class="widget has-shadow">
                    <div class="widget-body">

                        <div class="widget-body">
                            <div class="table-responsive">
                                <table id="sorting-table" class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Category ID</th>
                                            <th>Category Name</th>
                                            <th>Page Link</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                        $selectCat = "SELECT * FROM category";
                                        $catQuery = query($selectCat);
                                        while($row = mysqli_fetch_assoc($catQuery)):

                                        ?>


                                        <tr>
                                            <td><span class="text-primary"><?php echo $row['id']; ?></span></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['page_link']; ?></td>
                                            <td class="td-actions">
                                                <a href="category.php?edit=<?php echo $row['id']; ?>"><i class="la la-edit edit"></i></a>
                                                <a href="category.php?delete=<?php echo $row['id']; ?>"><i class="la la-close delete"></i></a>
                                            </td>
                                        </tr>

                                        <?php endwhile ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- End Row -->
    </div>

<?php 

if (isset($_POST['update'])) {
$id = $_GET['edit'];
$catTile = $_POST['cat_title'];
$catPageLink = $_POST['catPageLink'];
$catInsert = "UPDATE category SET title = '$catTile' , page_link = '$catPageLink' WHERE id = '$id'";
$catQuery = query($catInsert);
if ($catQuery) {
echo"<<script>alert('Data Update Successfully!')</script>";
header("Location: category.php");
}else {
die("QUERY FAILED!").mysqli_error($dbconn);
}
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteCat = "DELETE FROM category WHERE id ='$id'";
    $deleteQuery = query($deleteCat);
    if ($deleteQuery) {
        header("Location: category.php");
    }else {
        die("QUERY FAILED CHECK! ").mysqli_error($dbconn);
    }
    
}

?>
    <!-- End Container -->

    <!-- End Page Footer -->
    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>

</div>
<!-- End Content -->
</div>
<!-- End Page Content -->
</div>
<!-- Begin Vendor Js -->
<script src="assets/vendors/js/base/jquery.min.js"></script>
<script src="assets/vendors/js/base/core.min.js"></script>
<!-- End Vendor Js -->
<!-- Begin Page Vendor Js -->
<script src="assets/vendors/js/nicescroll/nicescroll.min.js"></script>
<script src="assets/vendors/js/app/app.min.js"></script>
<!-- End Page Vendor Js -->
</body>

</html>
