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

                    <h2 class="page-header-title">Student Archive</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item active">Student Archive</li>
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
                                $vLink = real_escape($_POST['vLink']);
                                $images = $_FILES['image'];

                                // print_r($images);

                                $imgName = $images['name'];
                                $imgTmp = $images['tmp_name'];
                                $tmpExt = explode('.',$imgName);
                                $imgExt =  strtolower(end($tmpExt));
                                $imgNewName = "review_".uniqid('',true).'.'.$imgExt;
                                $imgDes = "upload/review/".$imgNewName;
                                move_uploaded_file($imgTmp,$imgDes);

                                $cat_insert = "INSERT INTO review(video,image) VALUES('$vLink','$imgDes')";
                                $cat_sql = query($cat_insert);
                                if (!$cat_sql) {
                                    die("Query Failed " . mysqli_error($dbconn));
                                }else {
                                    header("Location: student_archive.php");
                                }

                            }


                        ?>
                        <form class="form-horizontal dropzone" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Video Link</label>
                                <div class="col-lg-8">
                                    <input  type="text" name="vLink" class="form-control" value="<?php if (isset($_POST['vLink'])) {echo $_POST['vLink'];} ?>" >
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Image</label>
                                <div class="col-lg-8">
                                    <input required type="file" name="image" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label"></label>
                                <div class="col-lg-9">
                                    <button type="submit" name="submit" class="btn btn-primary">Add Menu Item</button>
                                </div>
                            </div>

                        </form>
                        <?php 
                            if (isset($_GET['edit'])) {
                                $id         = real_escape($_GET['edit']);
                                $select_cat = "SELECT * FROM review WHERE id='$id'";
                                $cat_sql    = query($select_cat);
                                while ($row = mysqli_fetch_assoc($cat_sql)):
                                $dataImage = $row['image'];
                                ?>
                            
                                <h2 class="page-header-title text-success text-uppercase">Update Student Archive</h2><br><br>
                                <?php if(isset($cat_success)){echo $cat_success;} ?>
                                <form class="form-horizontal dropzone" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-3 form-control-label">Menu Title</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="vLink" class="form-control" value="<?php echo $row['video'];?>">
                                        </div>
                                    </div>


                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-3 form-control-label">Menu Link</label>
                                        <div class="col-lg-9">
                                            <img src="<?php echo $dataImage;?>" alt="ERROR" style="width:100px;">
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-3 form-control-label"></label>
                                        <div class="col-lg-9">
                                            <button type="submit" name="update" class="btn btn-success">Update Menu Item</button>
                                        </div>
                                    </div>

                                </form>


                                <?php
                            endwhile;
                            }
                            if (isset($_POST['update'])) {
                                $vLink = real_escape($_POST['vLink']);
                                $images = $_FILES['image'];

                                // print_r($images);

                                $imgName = $images['name'];
                                $imgTmp = $images['tmp_name'];
                                if (!empty($imgName)) {
                                    $tmpExt = explode('.',$imgName);
                                    $imgExt =  strtolower(end($tmpExt));
                                    $imgNewName = "review_".uniqid('',true).'.'.$imgExt;
                                    $imgDes = "upload/review/".$imgNewName;
                                    move_uploaded_file($imgTmp,$imgDes);
                                    $cat_insert = "UPDATE review SET video='$vLink',image='$imgDes' WHERE id = '$id'";
                                    $cat_sql = query($cat_insert);
                                } else {
                                    $imgDes = $dataImage;
                                    $cat_insert = "UPDATE review SET video='$vLink',image='$imgDes' WHERE id = '$id'";
                                    $cat_sql = query($cat_insert);    
                                }
                                
                                if (!$cat_sql) {
                                    die("Query Failed " . mysqli_error($dbconn));
                                }else {
                                    header("Location: student_archive.php");
                                }
                            }
                         ?>


                    </div>
                </div>
            </div>

<?php 

    if (isset($_GET['delete'])) {
        $id          = real_escape($_GET['delete']);
        $post_delete = "DELETE FROM review WHERE id='$id'";
        $delete_sql  = query($post_delete); 
        if (!$delete_sql) {
            die("DELETION ERROR " . mysqli_error($dbconn));
        }else {
            header("Location: student_archive.php");
        }
    }

?>

            <div class="col-xl-6 col-6">
                <div class="widget has-shadow">
                    <div class="widget-body">

                        <div class="widget-body">
                            <div class="table-responsive">

                                <table id="sorting-table" class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Menu ID</th>
                                            <th>Menu Title</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php 

                                    $select_cat = "SELECT * FROM review";
                                    $cat_sql    = query($select_cat);
                                    while ($row = mysqli_fetch_assoc($cat_sql)):

                                ?>

                                        <tr>
                                            <td><span class="text-primary"><?php echo $row['id'] ?></span></td>
                                            <td><?php echo $row['video'] ?></td>
                                            <td class="td-actions">
                                                <a href="student_archive.php?edit=<?php echo $row['id'] ?>"><i class="la la-edit edit"></i></a>
                                                <a href="student_archive.php?delete=<?php echo $row['id'] ?>"><i class="la la-close delete"></i></a>
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
