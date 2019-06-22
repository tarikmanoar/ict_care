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

                    <h2 class="page-header-title">Teachers</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item active">Teachers</li>
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
                                $teacherName     = real_escape($_POST['teacherName']);
                                $teacherPosition = real_escape($_POST['teacherPosition']);
                                $teacherAbout    = real_escape($_POST['teacherAbout']);
                                $facebook        = real_escape($_POST['facebook']);
                                $twitter         = real_escape($_POST['twitter']);
                                $behance         = real_escape($_POST['behance']);
                                $dribble         = real_escape($_POST['dribble']);
                                $linkedin         = real_escape($_POST['linkedin']);

                                $image           = $_FILES['teacherImage'];
                                $imgName         = $image['name'];
                                $imgTmp         = $image['tmp_name'];
                                $imgType         = $image['type'];
                                $imgSize         = $image['size'];
                                $imgError        = $image['error'];

                                $tmpExt          = explode(".",$imgName);
                                $imgExt          = strtolower(end($tmpExt));
                                $extArray        = ['jpeg','jpg','png'];

                                if (!empty($imgName)) {
                                    if ($imgError == 0) {
                                        if ($imgSize < 2000000) {
                                            if (in_array($imgExt,$extArray)) {
                                                $img_new_name = "Teacher_".uniqid('',true).'.'.$imgExt;
                                                $img_des      = "upload/teachers/".$img_new_name;
                                                $imgMove     = move_uploaded_file($imgTmp,$img_des);

                                                $insertTeacher = "INSERT INTO teachers (name, position, about, images, facebook, twitter, linkedin, behance, dribble)VALUES('$teacherName','$teacherPosition','$teacherAbout','$img_des','$facebook','$twitter','$linkedin','$behance','$dribble')";
                                                 $teacherQuery = query($insertTeacher);
                                                 if (!$teacherQuery) {
                                                     die("QUERY FAILED " . mysqli_error($dbconn));
                                                 } else {
                                                     header("Location: teachers.php");
                                                 }

                                            } else {
                                                $img_err = "Sorry.!! only JPG, JPEG files are allowed.!";
                                            }
                                        } else {
                                            $img_err = "The file is larger than 1MB.! ";
                                        }
                                    } else {
                                        $img_err = "There was an error uploading file!";
                                    }
                                }else {
                                    $img_err = "Images is required";
                                }

                            }


                        ?>
                        <form class="form-horizontal dropzone" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Teacher Name</label>
                                <div class="col-lg-8">
                                    <input required type="text" name="teacherName" class="form-control" value="<?php if (isset($_POST['teacherName'])) {echo $_POST['teacherName'];} ?>" >
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Teacher Position</label>
                                <div class="col-lg-8">
                                    <input required type="text" name="teacherPosition" class="form-control" value="<?php if (isset($_POST['teacherPosition'])) {echo $_POST['teacherPosition'];} ?>" >
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Teacher About</label>
                                <div class="col-lg-8">
                                    <textarea name="teacherAbout" class="form-control" rows="6"><?php if (isset($_POST['teacherAbout'])) {echo $_POST['teacherAbout'];} ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Teacher Image</label>
                                <div class="col-lg-8">
                                    <input required type="file" name="teacherImage" class="form-control" value="<?php if (isset($_POST['teacherImage'])) {echo $_POST['teacherImage'];} ?>" >
                                    <span style="color: #f00"><?php if(isset($img_err)) { echo $img_err; } ?></span>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Facebook Link</label>
                                <div class="col-lg-8">
                                    <input required type="text" name="facebook" class="form-control" value="<?php if (isset($_POST['facebook'])) {echo $_POST['facebook'];} ?>" >
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Twitter Link</label>
                                <div class="col-lg-8">
                                    <input required type="text" name="twitter" class="form-control" value="<?php if (isset($_POST['twitter'])) {echo $_POST['twitter'];} ?>" >
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Linkedin Link</label>
                                <div class="col-lg-8">
                                    <input required type="text" name="linkedin" class="form-control" value="<?php if (isset($_POST['linkedin'])) {echo $_POST['linkedin'];} ?>" >
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Behance Link</label>
                                <div class="col-lg-8">
                                    <input required type="text" name="behance" class="form-control" value="<?php if (isset($_POST['behance'])) {echo $_POST['behance'];} ?>" >
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Dribble Link</label>
                                <div class="col-lg-8">
                                    <input required type="text" name="dribble" class="form-control" value="<?php if (isset($_POST['dribble'])) {echo $_POST['dribble'];} ?>" >
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label"></label>
                                <div class="col-lg-9">
                                    <button type="submit" name="submit" class="btn btn-primary">Add Teacher</button>
                                </div>
                            </div>

                        </form>
                        <?php 
                            if (isset($_GET['edit'])) {
                                $id         = real_escape($_GET['edit']);
                                $select_cat = "SELECT * FROM teachers WHERE id='$id'";
                                $cat_sql    = query($select_cat);
                                while ($row = mysqli_fetch_assoc($cat_sql)):?>
                            
                                <h2 class="page-header-title">Update Categories</h2><br><br>
                                <?php if(isset($cat_success)){echo $cat_success;} ?>
                                <form class="form-horizontal dropzone" action="" method="post">
                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-3 form-control-label">Menu Title</label>
                                        <div class="col-lg-9">
                                            <input required type="text" name="cat_title" class="form-control" value="<?php echo $row['title'];?>">
                                        </div>
                                    </div>


                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-3 form-control-label">Menu Link</label>
                                        <div class="col-lg-9">
                                            <input required type="text" name="cat_link" class="form-control" value="<?php echo $row['page_link'];?>">
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
                                $id         = real_escape($_GET['edit']);
                                $cat_title  = real_escape($_POST['cat_title']);
                                $cat_link   = real_escape($_POST['cat_link']) ;
                                $cat_insert = "UPDATE teachers SET title = '$cat_title' , page_link = '$cat_link' WHERE id = '$id'";
                                $cat_sql    = query($cat_insert);
                                if (!$cat_sql) {
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
        $post_delete = "DELETE FROM teachers WHERE id='$id'";
        $delete_sql  = query($post_delete); 
        if (!$delete_sql) {
            die("DELETION ERROR " . mysqli_error($dbconn));
        }else {
            header("Location: teachers.php");
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
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Images</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php 

                                    $select_cat = "SELECT * FROM teachers";
                                    $cat_sql    = query($select_cat);
                                    $counter    = 0;
                                    while ($row = mysqli_fetch_assoc($cat_sql)):
                                    $counter++;

                                ?>

                                        <tr>
                                            <td><span class="text-primary"><?php echo $counter?></span></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['position'] ?></td>
                                            <td> <img src="<?php echo $row['images'] ?>" alt="ERROR!" style="width: 100px;"></td>
                                            <td class="td-actions">
                                                <a href="teachersEdit.php?edit=<?php echo $row['id'] ?>"><i class="la la-edit edit"></i></a>
                                                <a href="teachers.php?delete=<?php echo $row['id'] ?>"><i class="la la-close delete"></i></a>
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
