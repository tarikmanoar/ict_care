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
                    <h2 class="page-header-title">Update Courses Category</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item active">Update Courses Category</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <!-- End Page Header -->
        <!-- Begin Row -->
        <div class="row">
            <div class="col-xl-6 col-6 offset-2">
                <div class="widget has-shadow">
                    <div class="widget-body">
                        <?php 

                        if (isset($_POST['submit'])) {
                            $id = $_GET['edit'];
                            $courseTitle = $_POST['courseTitle'];
                            $courseDiscribe = $_POST['courseDiscribe'];
                            $courseBenefit = $_POST['courseBenefit'];
                            $courseIcon = $_POST['courseIcon'];
                            $courseFee = $_POST['courseFee'];
                            $courseValidate = $_POST['courseValidate'];

                            $courseImage = $_FILES['courseImage'];
    // Slider Images upload
    $img_name     = $courseImage['name'];
    $img_tmp      = $courseImage['tmp_name'];
    $img_size     = $courseImage['size'];
    $img_error    = $courseImage['error'];
    $img_type     = $courseImage['type'];

    $tmp_ext      = explode('.',$img_name);
    $img_ext      = strtolower(end($tmp_ext));
    $ext_arry     = ['jpg','jpeg'];

if (!empty($courseTitle)) {
    if (!empty($courseDiscribe)) {
        if (!empty($courseBenefit)) {
            if (!empty($courseIcon)) {
                if (!empty($courseValidate)) {
                    if (!empty($img_name)) {
                        if (in_array($img_ext, $ext_arry)) {
                            if ($img_error == 0) {
                                if ($img_size <= 2000000) {
                                    $img_new_name = "course_".uniqid('',true).'.'.$img_ext;
                                    $img_des      = "upload/course/".$img_new_name;
                                    $img_move     = move_uploaded_file($img_tmp,$img_des);

                                    $courseCat = "UPDATE course_category SET 
                                        course_title = '$courseTitle',
                                        course_discription='$courseDiscribe',
                                        course_benefit='$courseBenefit',
                                        course_icon='$courseIcon',
                                        course_validate='$courseValidate',
                                        course_image='$img_des',
                                        course_fee='$courseFee' WHERE id='$id'";
                                    $courseSql = query($courseCat);
                                    if (!$courseSql) {
                                        die("QUERY FAILED ". mysql_error($dbconn));
                                    } else {
                                        header("Location: course_cat.php");
                                    }
                                    
                                } else {
                                    $errorImg = "Your Selected File larger than 2MB!";
                                }
                            } else {
                                $errorImg = "There is an Error Uploading file!";
                            }
                        } else {
                            $errorImg = "Sorry!! Only JPG,JPEG files are allowed.";
                        }
                    } else {
                        $errorImg= "Image is requred";
                    }
                } else {
                    $errorValidate = "Course Validate is requred.";
                }
            } else {
                $errorIcon = "Course Icon is requred.";
            }
        } else {
            $errorBenefit  = " Course Benefit is Requred.";
        }
    } else {
        $errorDiscribe = "Course Description is requred.";
    }
} else {
    $errorTitle = "Course Title is requred.";
}

                            
                        }
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $selectCourse = "SELECT * FROM course_category WHERE id='$id'";
    $courseQuery  = query($selectCourse);
    $row          = mysqli_fetch_assoc($courseQuery);
}

                        ?>

                        <form class="form-horizontal dropzone" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Course Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="courseTitle" class="form-control" value="<?php echo $row['course_title']; ?>">

                                    <span style="color: #f00"><?php if(isset($errorTitle)) { echo $errorTitle; } ?></span>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Course Discription</label>
                                <div class="col-lg-9">
                                    <textarea name="courseDiscribe" class="form-control" rows="10" value="<?php echo $row['course_discription']; ?>"></textarea>
                                    <span style="color: #f00"><?php if(isset($errorDiscribe)) { echo $errorDiscribe; } ?></span>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Course Benefit</label>
                                <div class="col-lg-9">

                                    <input type="text" name="courseBenefit" class="form-control" value="<?php echo $row['course_benefit']; ?>">
                                    <span style="color: #f00"><?php if(isset($errorBenefit)) { echo $errorBenefit; } ?></span>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Course Icon</label>
                                <div class="col-lg-9">
                                    <input type="text" name="courseIcon" class="form-control" placeholder="Ex: fa-angry" value="<?php echo $row['course_icon']; ?>">
                                    <a href="https://fontawesome.com/v4.7.0/icons/" style="float: right;color: blue;font-size: 12px;" target="_blank">pick icons</a>
                                    <span style="color: #f00"><?php if(isset($errorIcon)) { echo $errorIcon; } ?></span>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                
                                <label class="col-lg-3 form-control-label">Course Image</label>
                                <div class="col-lg-9">
                                    <img style="width: 200px;" src="<?php echo $row['course_image']; ?>"alt="">
                                    <input type="file" name="courseImage" class="form-control">
                                    (Max Size 1MB and 900X600)
                                    <span style="color: #f00"><?php if(isset($errorImg)) { echo $errorImg; } ?></span>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Course Fee</label>
                                <div class="col-lg-9">
                                    <input type="text" name="courseFee" class="form-control" placeholder="$100.00" value="<?php echo $row['course_fee']; ?>">
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Course Validate</label>
                                <div class="col-lg-9">
                                    <input type="text" name="courseValidate" class="form-control" placeholder="6th Month" value="<?php echo $row['course_validate']; ?>">
                                    <span style="color: #f00"><?php if(isset($errorValidate)) { echo $errorValidate; } ?></span>
                                </div>
                            </div>


                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label"></label>
                                <div class="col-lg-9">
                                    <button type="submit" name="submit" class="btn btn-primary">Update Course</button>
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
                <p class="text-gradient-02">Design By Manoar</p>
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
