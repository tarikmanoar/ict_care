<?php include("includes/header.php") ?>
<?php include("includes/preloader.php") ?>
<?php include("includes/top_nav.php") ?>

<?php include("includes/nav.php") ?>
<!-- End Left Sidebar -->
<div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">

                    <h2 class="page-header-title">client</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item active">client</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <!-- End Page Header -->
        <!-- Begin Row -->
        <div class="row">
            <div class="col-xl-6 col-6">
                <div class="widget has-shadow">
                    <div class="widget-body">
                        
                        <?php 

                            if (isset($_POST['submit'])) {
                                $client_name = real_escape($_POST['client_name']);
                                $client_position = real_escape($_POST['client_position']) ;
                                $client_about = real_escape($_POST['client_about']) ;
                                $cat_insert = "INSERT INTO client (name,position,about) VALUES('$client_name','$client_position','$client_about')";
                                $cat_sql = query($cat_insert);
                                if (!$cat_sql) {
                                    die("Query Failed " . mysqli_error($dbconn));
                                }else {
                                    echo $cat_success = "<p style='color: #17a200;padding: 5px;background: #b9ffcf;text-align: center;'>Menu Created Successfully!</p>";
                                }

                            }


                        ?>
                        <form class="form-horizontal dropzone" action="" method="post">
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="client_name" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Position</label>
                                <div class="col-lg-9">
                                    <select name="client_position"  class="form-control">
                                        <option value="client">Client</option>
                                        <option value="sponcer">Sponcer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">About</label>
                                <div class="col-lg-9">
                                    <textarea name="client_about" rows="8" cols="45"></textarea>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label"></label>
                                <div class="col-lg-9">
                                    <button type="submit" name="submit" class="btn btn-primary">Insert</button>
                                </div>
                            </div>

                        </form>
                        <?php 
                            if (isset($_GET['edit'])) {
                                $id         = real_escape($_GET['edit']);
                                $select_cat = "SELECT * FROM client WHERE id='$id'";
                                $cat_sql    = query($select_cat);
                                while ($row = mysqli_fetch_assoc($cat_sql)):?>
                            
                                <h2 class="page-header-title">Update Client</h2><br><br>
                                <?php if(isset($cat_success)){echo $cat_success;} ?>
                                <form class="form-horizontal dropzone" action="" method="post">
                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-3 form-control-label">Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="client_name" class="form-control" value="<?php echo $row['name'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-3 form-control-label">About</label>
                                        <div class="col-lg-9">
                                            <textarea name="client_about" rows="8" cols="45"><?php echo $row['about'];?></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-3 form-control-label">Position</label>
                                        <div class="col-lg-9">
                                            <select name="client_position"  class="form-control">
                                                <option value="client">Client</option>
                                                <option value="sponcer">Sponcer</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-3 form-control-label"></label>
                                        <div class="col-lg-9">
                                            <button type="submit" name="update" class="btn btn-success">Update</button>
                                        </div>
                                    </div>

                                </form>


                                <?php
                            endwhile;
                            }
                            if (isset($_POST['update'])) {
                                $id         = real_escape($_GET['edit']);
                                $client_name  = real_escape($_POST['client_name']);
                                $client_position   = real_escape($_POST['client_position']) ;
                                $client_insert = "UPDATE client SET name = '$client_name' , position = '$client_position' WHERE id = '$id'";
                                $client_sql    = query($client_insert);
                                if (!$client_sql) {
                                    die("Query Failed " . mysqli_error($dbconn));
                                }else {
                                    $cat_success = "<p style='color: #17a200;padding: 5px;background: #b9ffcf;text-align: center;'>Menu Update Successfully!</p>";
                                }
                            }
                         ?>


                    </div>
                </div>
            </div>

<?php 

    if (isset($_GET['delete'])) {
        $id          = real_escape($_GET['delete']);
        $post_delete = "DELETE FROM client WHERE id='$id'";
        $delete_sql  = query($post_delete); 
        if (!$delete_sql) {
            die("DELETION ERROR " . mysqli_error($dbconn));
        }else {
            header("Location: client.php");
        }
    }

?>

            <div class="col-xl-6 col-6">
                <div class="widget has-shadow">
                    <div class="widget-body">
                        <h2 class="page-header-title">Client & Sponcer List</h2><br><br>
                        <div class="widget-body">
                            <div class="table-responsive">

                                <table id="sorting-table" class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Client Name</th>
                                            <th>Position</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php 

                                    $select_client = "SELECT * FROM client";
                                    $client_sql    = query($select_client);
                                    while ($row = mysqli_fetch_assoc($client_sql)):

                                ?>

                                        <tr>
                                            <td><span class="text-primary"><?php echo $row['id'] ?></span></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['position'] ?></td>
                                            <td class="td-actions">
                                                <a href="client.php?edit=<?php echo $row['id'] ?>"><i class="la la-edit edit"></i></a>
                                                <a href="client.php?delete=<?php echo $row['id'] ?>"><i class="la la-close delete"></i></a>
                                            </td>
                                        </tr>
                                <?php endwhile  ?>


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
    <!-- End Container -->
    <!-- Begin Page Footer-->
    <footer class="main-footer fixed-footer">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                <p class="text-gradient-02">Design By ICT CARE</p>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="documentation.html">Documentation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="changelog.html">Changelog</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- End Page Footer -->
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
