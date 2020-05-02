<?php include("includes/header.php") ?>
<?php include("includes/preloader.php") ?>
<?php include("includes/top_nav.php") ?>
<?php include("includes/nav.php") ?>
<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">

                    <h2 class="page-header-title">Team Members</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item active">Team Members</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-6 offset-3">
                <div class="widget has-shadow">
                    <div class="widget-body">
                        
<?php 
    $id         = real_escape($_GET['edit']);
    $select_cat = "SELECT * FROM team_member WHERE id='$id'";
    $cat_sql    = query($select_cat);
    $row = mysqli_fetch_assoc($cat_sql);
    $databaseImg = $row['image'];

if (isset($_POST['update'])) {

    $memberName     = real_escape($_POST['memberName']);
    $memberPosition = real_escape($_POST['memberPosition']);
    $memberFb       = real_escape($_POST['memberFb']);
    $memberTw       = real_escape($_POST['memberTw']);
    // $memberImg      = $_FILES['memberImg']['name'];
    $imgName        = $_FILES['memberImg']['name'];
    $imgTmp         = $_FILES['memberImg']['tmp_name'];
    $imgError       = $_FILES['memberImg']['error'];
    $imgSize        = $_FILES['memberImg']['size'];
    $imgType        = $_FILES['memberImg']['type'];



    $tmpExt         = explode(".",$imgName);
    $imgExt         = strtolower(end($tmpExt));
    $extArray       = ['jpeg','jpg','png'];


    $imgNewName = "Member_".uniqid('',true).'.'.$imgExt;

    if (empty($imgName)) {
        $imgDes = $databaseImg;
    } else {
        $imgDes     = "upload/team/".$imgNewName;
    }

    $imgMove    = move_uploaded_file($imgTmp,$imgDes);

        $cat_insert = "UPDATE team_member SET name = '$memberName',position = '$memberPosition',facebook = '$memberFb', twitter = '$memberTw',image = '$imgDes' WHERE id = '$id' ";
        $cat_sql = query($cat_insert);
        if (!$cat_sql) {
            die("Query Failed " . mysqli_error($dbconn));
        }else {
            header("Location: team_members.php");
        }
}

    
?>
                        <form class="form-horizontal dropzone" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="memberName" class="form-control" value="<?php  echo $row['name']; ?>">
                                    <span style="color: #f00"><?php if(isset($name_err)) { echo $name_err; } ?></span>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Position</label>
                                <div class="col-lg-9">
                                    <input type="text" name="memberPosition" class="form-control" value="<?php  echo $row['position']; ?>">
                                    <span style="color: #f00"><?php if(isset($position_err)) { echo $position_err; } ?></span>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Facebook Link</label>
                                <div class="col-lg-9">
                                    <input type="text" name="memberFb" class="form-control" value="<?php  echo $row['facebook']; ?>">
                                    <span style="color: #f00"><?php if(isset($fb_err)) { echo $fb_err; } ?></span>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Twitter Link</label>
                                <div class="col-lg-9">
                                    <input type="text" name="memberTw" class="form-control" value="<?php  echo $row['twitter']; ?>">
                                    <span style="color: #f00"><?php if(isset($tw_err)) { echo $tw_err; } ?></span>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Member Image</label>
                                <div class="col-lg-9">
                                    <img src="<?php  echo $row['image']; ?>" alt="ERROR!" style='width: 150px;'>
                                    <input type="file" name="memberImg" class="form-control">
                                    <span style="color: #f00"><?php if(isset($img_err)) { echo $img_err; } ?></span>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label"></label>
                                <div class="col-lg-9">
                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                </div>
                            </div>

                        </form>


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
