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

                    <h2 class="page-header-title">EVENT</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item active">EVENT</li>
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
                            $select_cat = "SELECT * FROM event WHERE id = '$id'";
                            $cat_sql    = query($select_cat);
                            $row  = mysqli_fetch_assoc($cat_sql);
                            $dataImage = $row['image'];

                            if (isset($_POST['update'])) {
                                $eTitle = real_escape($_POST['eTitle']);
                                $eDes = real_escape($_POST['eDes']);
                                $eDate = real_escape($_POST['eDate']);
                                $eLocation = real_escape($_POST['eLocation']);
                                $ePhone = real_escape($_POST['ePhone']);
                                $eMail = real_escape($_POST['eMail']);
                                $image = $_FILES['eImage'];

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
                                                $img_des      = "upload/event/".$img_new_name;
                                                $imgMove     = move_uploaded_file($imgTmp,$img_des);

                                                $insertTeacher = "UPDATE event SET title='$eTitle',description='$eDes',date='$eDate',location='$eLocation',phone='$ePhone',mail='$eMail',image='$img_des' WHERE id = '$id'";
                                                 $teacherQuery = query($insertTeacher);
                                                 if (!$teacherQuery) {
                                                     die("QUERY FAILED " . mysqli_error($dbconn));
                                                 } else {
                                                     header("Location: event.php");
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
                                    $img_des = $dataImage;
                                    $insertTeacher = "UPDATE event SET title='$eTitle',description='$eDes',date='$eDate',location='$eLocation',phone='$ePhone',mail='$eMail',image='$img_des' WHERE id = '$id'";
                                     $teacherQuery = query($insertTeacher);
                                     if (!$teacherQuery) {
                                         die("QUERY FAILED " . mysqli_error($dbconn));
                                     } else {
                                         header("Location: event.php");
                                     }
                                }

                            }


                        ?>
                        <form class="form-horizontal dropzone" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Title</label>
                                <div class="col-lg-9">
                                    <input type="text" name="eTitle" class="form-control" value="<?php echo $row['title'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Description</label>
                                <div class="col-lg-9">
                                    <textarea name="eDes" class="form-control" required><?php echo $row['description'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Date</label>
                                <div class="col-lg-9">
                                    <input type="text" name="eDate" class="form-control" value="<?php echo $row['date'] ?>" required placeholder="2019-06-21">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Location</label>
                                <div class="col-lg-9">
                                    <input type="text" name="eLocation" class="form-control" value="<?php echo $row['location'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Phone Number</label>
                                <div class="col-lg-9">
                                    <input type="text" name="ePhone" class="form-control" value="<?php echo '0'.$row['phone'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Mail Address</label>
                                <div class="col-lg-9">
                                    <input type="email" name="eMail" class="form-control" value="<?php echo $row['mail'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Image</label>
                                <div class="col-lg-9">
                                    <img src="<?php echo $row['image'] ?>" alt="ERROR" style='width:100px'>
                                    <input type="file" name="eImage" class="form-control">
                                    <span style="color: #f00"><?php if(isset($img_err)) { echo $img_err; } ?></span>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label"></label>
                                <div class="col-lg-9">
                                    <button type="submit" name="update" class="btn btn-primary">Add Menu Item</button>
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
