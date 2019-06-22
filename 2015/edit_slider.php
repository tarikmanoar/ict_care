<?php include("includes/header.php") ?>
<!-- Begin Preloader -->


<?php include("includes/preloader.php") ?>


<!-- End Preloader -->



<?php include("includes/top_nav.php") ?>


<!-- End Topbar -->




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
                    <h2 class="page-header-title">Slider</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item active">Slider</li>
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
$id = $_GET['edit'];
$selectSlider = "SELECT * FROM slider WHERE id='$id'";
$sliderQuery = query($selectSlider);
$row  = mysqli_fetch_assoc($sliderQuery);
$dataImage = $row['slider_image'];
    if (isset($_POST['add_slider'])) {
        $id = $_GET['edit'];
        $slider_title = real_escape($_POST['slider_title']);
        $slider_typer = real_escape($_POST['slider_typer']);
        $slider_dis   = real_escape($_POST['slider_dis']);
        $slider_show  = real_escape($_POST['slider_show']);

        // Slider Images upload
        $img_name     = $_FILES['slider_img']['name'];
        $img_tmp      = $_FILES['slider_img']['tmp_name'];
        $img_size     = $_FILES['slider_img']['size'];
        $img_error    = $_FILES['slider_img']['error'];
        $img_type     = $_FILES['slider_img']['type'];

        $tmp_ext      = explode('.',$img_name);
        $img_ext      = strtolower(end($tmp_ext));
        $ext_arry     = ['jpg','jpeg'];

        if (!empty($slider_title)) {
            if (!empty($slider_typer)) {
                if (!empty($slider_dis)) {
                    if (!empty($img_name)) {
                         if (!empty($slider_show)) {
                            if (in_array($img_ext,$ext_arry)) {
                                if ($img_error == 0) {
                                    if ($img_size < 2000000) {
                                        $img_new_name = "slider_".uniqid('',true).'.'.$img_ext;
                                        $img_des      = "upload/slider/".$img_new_name;
                                        $img_move     = move_uploaded_file($img_tmp,$img_des);

                                        $insert_slider = "UPDATE slider SET slider_title='$slider_title',slider_typer='$slider_typer',slider_dis='$slider_dis',slider_show='$slider_show',slider_image='$img_des' WHERE id = '$id'";
                                        $slider_sql    = query($insert_slider);
                                        if (!$slider_sql) {
                                            die("QUERY FAILED " . mysqli_error($dbconn));
                                        }else {
                                            header("Location: slider.php");
                                        }
                                    }else {
                                        $img_err = "The file is larger than 1MB.! ";
                                    }
                                }else {
                                    $img_err = "There was an error uploading file!";
                                }
                            }else {
                                $img_err = "Sorry.!! only JPG, JPEG files are allowed.!";
                            }
                        }else {
                            $screen_err = "Screen is required";
                        }
                    }else {
                        $img_des = $dataImage;
                        $insert_slider = "UPDATE slider SET slider_title='$slider_title',slider_typer='$slider_typer',slider_dis='$slider_dis',slider_show='$slider_show',slider_image='$img_des' WHERE id = '$id'";
                        $slider_sql    = query($insert_slider);
                        if (!$slider_sql) {
                            die("QUERY FAILED " . mysqli_error($dbconn));
                        }else {
                            header("Location: slider.php");
                        }
                    }
                }else {
                    $des_err = "Description is required";
                }
            }else {
                $typer_err = "Typer is required";
            }
        }else {
            $title_err = "Title is required";
        }
    }


?>

                        <form class="form-horizontal dropzone" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Slider Title</label>
                                <div class="col-lg-9">
                                    <input type="text" name="slider_title" class="form-control" value="<?php echo $row['slider_title'] ?>">
                                    <span style="color: #f00"><?php if(isset($title_err)) { echo $title_err; } ?></span>
                                </div>
                            </div>


                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Slider Typer text</label>
                                <div class="col-lg-9">
                                    <input type="text" name="slider_typer" class="form-control" value="<?php echo $row['slider_typer'] ?>">
                                    <span style="color: #f00"><?php if(isset($typer_err)) { echo $typer_err; } ?></span>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Slider Short Description
</label>
                                <div class="col-lg-9">
                                    <textarea name="slider_dis" class="form-control"  rows="10"><?php echo $row['slider_title'] ?></textarea>
                                    <span style="color: #f00"><?php if(isset($des_err)) { echo $des_err; } ?></span>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Slider Image (Max Size 2MB and 1200X800)</label>
                                <div class="col-lg-9">
                                    <img src="<?php echo $dataImage; ?>" alt="ERROR" style='width:200px'>
                                    <input type="file" name="slider_img" class="form-control">
                                    <span style="color: #f00"><?php if(isset($img_err)) { echo $img_err; } ?></span>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Show Slider Home Screen </label>
                                <div class="col-lg-9">
                                    <select name="slider_show" class="form-control">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <span style="color: #f00"><?php if(isset($screen_err)) { echo $screen_err; } ?></span>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label"></label>
                                <div class="col-lg-9">
                                    <button type="submit" name="add_slider" class="btn btn-primary">Insert</button>
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

    </footer>
    <!-- End Page Footer -->
    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
    <!-- Offcanvas Sidebar -->







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
