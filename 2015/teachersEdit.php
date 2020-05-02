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
            <div class="col-xl-6 col-6 offset-3">
                <div class="widget has-shadow">
                    <div class="widget-body">
                        
                        <?php 


                            if (isset($_POST['update'])) {
                                $id              = $_GET['edit'];
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

                                                $insertTeacher = "UPDATE teachers SET 
                                                name='$teacherName',
                                                position='$teacherPosition',
                                                about='$teacherAbout',
                                                images='$img_des',
                                                facebook='$facebook',
                                                twitter='$twitter',
                                                linkedin='$linkedin',
                                                behance='$behance',
                                                dribble='$dribble' WHERE id= '$id'";
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

                        $id         = real_escape($_GET['edit']);
                        $select_cat = "SELECT * FROM teachers WHERE id='$id'";
                        $cat_sql    = query($select_cat);
                        $row = mysqli_fetch_assoc($cat_sql);


                        ?>
                        <form class="form-horizontal dropzone" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Teacher Name</label>
                                <div class="col-lg-8">
                                    <input required type="text" name="teacherName" class="form-control" value="<?php echo $row['name']; ?>" >
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Teacher Position</label>
                                <div class="col-lg-8">
                                    <input required type="text" name="teacherPosition" class="form-control" value="<?php echo $row['position']; ?>" >
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Teacher About</label>
                                <div class="col-lg-8">
                                    <textarea name="teacherAbout" class="form-control" rows="6"><?php echo $row['about']; ?> </textarea>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Teacher Image</label>
                                <div class="col-lg-8">
                                    <input required type="file" name="teacherImage" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Facebook Link</label>
                                <div class="col-lg-8">
                                    <input required type="text" name="facebook" class="form-control" value="<?php echo $row['facebook']; ?>"  >
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Twitter Link</label>
                                <div class="col-lg-8">
                                    <input required type="text" name="twitter" class="form-control" value="<?php echo $row['twitter']; ?>"  >
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Linkedin Link</label>
                                <div class="col-lg-8">
                                    <input required type="text" name="linkedin" class="form-control" value="<?php echo $row['linkedin']; ?>"  >
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Behance Link</label>
                                <div class="col-lg-8">
                                    <input required type="text" name="behance" class="form-control" value="<?php echo $row['behance']; ?>"  >
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label">Dribble Link</label>
                                <div class="col-lg-8">
                                    <input required type="text" name="dribble" class="form-control" value="<?php echo $row['dribble']; ?>"  >
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label"></label>
                                <div class="col-lg-9">
                                    <button type="submit" name="update" class="btn btn-primary">Add Teacher</button>
                                </div>
                            </div>

                        </form>
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
