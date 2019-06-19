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
                    <h2 class="page-header-title">Courses Category</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item active">Courses Category</li>
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
                            $courseTitle    = real_escape($_POST['courseTitle']);
                            $courseDiscribe = real_escape($_POST['courseDiscribe']);
                            $courseBenefit  = real_escape($_POST['courseBenefit']);
                            $courseIcon     = real_escape($_POST['courseIcon']);
                            $courseFee      = real_escape($_POST['courseFee']);
                            $courseValidate = real_escape($_POST['courseValidate']);

                            $courseImage = real_escape($_FILES['courseImage']);
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
                                if ($img_size <= 1000000) {
                                    $img_new_name = "course_".uniqid('',true).'.'.$img_ext;
                                    $img_des      = "upload/course/".$img_new_name;
                                    $img_move     = move_uploaded_file($img_tmp,$img_des);

                                    $courseCat = "INSERT INTO course_category(course_title, course_discription, course_icon,course_image, course_fee, course_validate, course_benefit) VALUES('$courseTitle','$courseDiscribe','$courseIcon','$img_des','$courseFee','$courseValidate','$courseBenefit')";
                                    $courseSql = query($courseCat);
                                    if (!$courseSql) {
                                        die("QUERY FAILED ". mysql_error($dbconn));
                                    } else {
                                        header("Location: course_cat.php");
                                    }
                                    
                                } else {
                                    $errorImg = "Your Selected File larger than 1MB!";
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

                        ?>

                        <form class="form-horizontal dropzone" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Course Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="courseTitle" class="form-control" value="<?php if(isset($courseTitle)){echo $courseTitle;} ?>">
                                    <span style="color: #f00"><?php if(isset($errorTitle)) { echo $errorTitle; } ?></span>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Course Discription</label>
                                <div class="col-lg-9">
                                    <textarea name="courseDiscribe" class="form-control" rows="10" value="<?php if(isset($courseDiscribe)){echo $courseDiscribe;} ?>"></textarea>
                                    <span style="color: #f00"><?php if(isset($errorDiscribe)) { echo $errorDiscribe; } ?></span>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Course Benefit</label>
                                <div class="col-lg-9">

                                    <input type="text" name="courseBenefit" class="form-control" value="<?php if(isset($courseBenefit)){echo $courseBenefit;} ?>">
                                    <span style="color: #f00"><?php if(isset($errorBenefit)) { echo $errorBenefit; } ?></span>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Course Icon</label>
                                <div class="col-lg-9">
                                    <input type="text" name="courseIcon" class="form-control" placeholder="Ex: fa-angry" value="<?php if(isset($courseIcon)){echo $courseIcon;} ?>">
                                    <a href="https://fontawesome.com/v4.7.0/icons/" style="float: right;color: blue;font-size: 12px;" target="_blank">pick icons</a>
                                    <span style="color: #f00"><?php if(isset($errorIcon)) { echo $errorIcon; } ?></span>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Course Image</label>
                                <div class="col-lg-9">
                                    <input type="file" name="courseImage" class="form-control">
                                    (Max Size 1MB and 900X600)
                                    <span style="color: #f00"><?php if(isset($errorImg)) { echo $errorImg; } ?></span>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Course Fee</label>
                                <div class="col-lg-9">
                                    <input type="text" name="courseFee" class="form-control" placeholder="$100.00" value="<?php if(isset($courseFee)){echo $courseFee;} ?>">
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Course Validate</label>
                                <div class="col-lg-9">
                                    <input type="text" name="courseValidate" class="form-control" placeholder="6th Month" value="<?php if(isset($courseValidate)){echo $courseValidate;} ?>">
                                    <span style="color: #f00"><?php if(isset($errorValidate)) { echo $errorValidate; } ?></span>
                                </div>
                            </div>


                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label"></label>
                                <div class="col-lg-9">
                                    <button type="submit" name="submit" class="btn btn-primary">Add Course</button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
            <div class="col-4 offset-1">
                <?php 

                if (isset($_POST['submitItem'])) {
                    $courseItem   = real_escape($_POST['courseItem']);
                    $insertCourse = real_escape($_POST['insertCourse']);

                    $insertItem   = "INSERT INTO course_item (courseItem , courseTitle) VALUES ('$courseItem','$insertCourse')";
                    $insertQuery  = query($insertItem);
                    if (!$insertQuery) {
                        die("QUERY FAILED " . mysqli_error($dbconn));
                    }else {
                        header("Location: course_cat.php");
                    }

                }

                ?>
                <form action="" method="post" accept-charset="utf-8">
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-3 form-control-label">Item</label>
                        <div class="col-lg-9">
                            <input type="text" name="courseItem" class="form-control" placeholder="HTML5" value="<?php if(isset($courseItem)){echo $courseItem;} ?>">
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-3 form-control-label">Select Course</label>
                        <div class="col-lg-9">
                            <select name="insertCourse" class="form-control">
                            <?php 

                            $selectCourse = "SELECT * FROM course_category";
                            $courseQuery  = query($selectCourse);
                            while($row = mysqli_fetch_assoc($courseQuery)):
                            ?>
                                <option value="<?php echo $row['course_title']; ?>"><?php echo $row['course_title']; ?></option>
                            <?php endwhile ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-3 form-control-label"></label>
                        <div class="col-lg-9">
                            <button type="submit" name="submitItem" class="btn btn-primary">Add Item</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
        <div class="row">
            <div class="col-xl col">
                <div class="widget has-shadow">
                    <div class="widget-body">
                        <div class="widget-body">
                            <div class="table-responsive">
                                <table id="sorting-table" class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Icon</th>
                                            <th>Image</th>
                                            <th>Fee</th>
                                            <th>Validate</th>
                                            <th>Course Item</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $selectCourese = "SELECT * FROM course_category";
                                            $courseSql     = query($selectCourese);
                                            while ($row = mysqli_fetch_assoc($courseSql)):
                                            $course_title = $row['course_title'];
                                        ?>
                                        <tr>
                                            <td><span class="text-primary"><?php echo $row['course_title']; ?></span></td>
                                            <td><span class="text-primary"><i style="font-size: 25px;background: #E76C90;padding: 20px;color: #fff;border-radius: 50%;" class="fa <?php echo $row['course_icon']; ?>"></i></span></td>
                                            <td><span class="text-primary"><img style="width: 200px;" src="<?php echo $row['course_image']; ?>" alt="EMPTY"></span></td>
                                            <td><span class="text-primary">$<?php echo $row['course_fee']; ?></span></td>
                                            <td><span class="text-primary"><?php echo $row['course_validate']; ?> Month</span></td>
                                            <td><select name="" multiple class="text-primary form-control">
                                                <?php 
                                                    $selectItem = "SELECT * FROM course_item where courseTitle = '$course_title'";
                                                    $itemQuery  = query($selectItem);
                                                    while($itemRow    = mysqli_fetch_assoc($itemQuery)):
                                                ?>
                                                <option value="<?php echo $itemRow['courseItem']; ?>"><?php echo $itemRow['courseItem']; ?></option>
                                            <?php endwhile ?>
                                            </select>
                                            </td>
                                            <td class="td-actions">
                                            <a href="edit_course.php?edit=<?php echo $row['id']; ?> "><i class="la la-edit edit"></i></a>
                                            <a href="course_cat.php?delete=<?php echo $row['id']; ?> "><i class="la la-close delete"></i></a>
                                        </td>
                                        </tr>
                                    <?php endwhile ?>
                                    </tbody>
                                </table>
                                <?php 

                                    if (isset($_GET['delete'])) {
                                        $id = $_GET['delete'];
                                        $deleteCourse = "DELETE FROM course_category WHERE id='$id'";
                                        $deleteQuery  = query($deleteCourse);
                                        header("Location: course_cat.php");
                                    }
                                ?>
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
