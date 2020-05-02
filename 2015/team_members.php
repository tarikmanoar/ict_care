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
            <div class="col-xl-6 col-6">
                <div class="widget has-shadow">
                    <div class="widget-body">
                        
<?php 

if (isset($_POST['submit'])) {

    $memberName     = real_escape($_POST['memberName']);
    $memberPosition = real_escape($_POST['memberPosition']);
    $memberFb       = real_escape($_POST['memberFb']);
    $memberTw       = real_escape($_POST['memberTw']);
    $memberImg      = $_FILES['memberImg'];

    $imgName        = $_FILES['memberImg']['name'];
    $imgTmp         = $_FILES['memberImg']['tmp_name'];
    $imgError       = $_FILES['memberImg']['error'];
    $imgSize        = $_FILES['memberImg']['size'];
    $imgType        = $_FILES['memberImg']['type'];

    $tmpExt         = explode(".",$imgName);
    $imgExt         = strtolower(end($tmpExt));
    $extArray       = ['jpeg','jpg','png'];

    if (!empty($memberName)) {
        if (!empty($memberPosition)) {
            if (!empty($memberFb)) {
                if (!empty($memberTw)) {
                    if (!empty($imgName)) {
                        if (in_array($imgExt,$extArray)) {
                            if ($imgError == 0) {
                                if ($imgSize < 2000000) {
                                    $imgNewName = "Member_".uniqid('',true).'.'.$imgExt;
                                    $imgDes     = "upload/team/".$imgNewName;
                                    $imgMove    = move_uploaded_file($imgTmp,$imgDes);

                                        $cat_insert = "INSERT INTO team_member(name,position,facebook,twitter, image) 
                                        VALUES('$memberName','$memberPosition','$memberFb','$memberTw','$imgDes')";
                                        $cat_sql = query($cat_insert);
                                        if (!$cat_sql) {
                                            die("Query Failed " . mysqli_error($dbconn));
                                        }else {
                                            header("Location: team_members.php");
                                        }
                                } else {
                                    $img_err = " The file is larger than 1MB.!";
                                }
                            } else {
                                $img_err = "There was an error uploading file!";
                            }
                        } else {
                            $img_err = "Sorry.!! only JPG, JPEG files are allowed.!";
                        }
                    } else {
                        $img_err = "Images is required";
                    }
                } else {
                    $fb_err = "Facebook Link is required";
                }
            } else {
                $tw_err = "Twitter Link is required";
            }
        } else {
            $position_err = "Position is required";
        }
    } else {
        $name_err = "Name is required";
    }
}
?>
                        <form class="form-horizontal dropzone" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="memberName" class="form-control" value="<?php if (isset($_POST['memberName'])) {echo $_POST['memberName'];} ?>">
                                    <span style="color: #f00"><?php if(isset($name_err)) { echo $name_err; } ?></span>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Position</label>
                                <div class="col-lg-9">
                                    <input type="text" name="memberPosition" class="form-control" value="<?php if (isset($_POST['memberPosition'])) {echo $_POST['memberPosition'];} ?>">
                                    <span style="color: #f00"><?php if(isset($position_err)) { echo $position_err; } ?></span>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Facebook Link</label>
                                <div class="col-lg-9">
                                    <input type="text" name="memberFb" class="form-control" value="<?php if (isset($_POST['memberFb'])) {echo $_POST['memberFb'];} ?>">
                                    <span style="color: #f00"><?php if(isset($fb_err)) { echo $fb_err; } ?></span>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Twitter Link</label>
                                <div class="col-lg-9">
                                    <input type="text" name="memberTw" class="form-control" value="<?php if (isset($_POST['memberTw'])) {echo $_POST['memberTw'];} ?>">
                                    <span style="color: #f00"><?php if(isset($tw_err)) { echo $tw_err; } ?></span>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Member Image</label>
                                <div class="col-lg-9">
                                    <input type="file" name="memberImg" class="form-control">
                                    <span style="color: #f00"><?php if(isset($img_err)) { echo $img_err; } ?></span>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label"></label>
                                <div class="col-lg-9">
                                    <button type="submit" name="submit" class="btn btn-primary">Add Member</button>
                                </div>
                            </div>

                        </form>
                        <?php 
                            if (isset($_GET['edit'])) {
                                $id         = real_escape($_GET['edit']);
                                $select_cat = "SELECT * FROM team_member WHERE id='$id'";
                                $cat_sql    = query($select_cat);
                                while ($row = mysqli_fetch_assoc($cat_sql)):?>
                            
                                <h2 class="page-header-title">Update Team Members</h2><br><br>
                                <?php if(isset($cat_success)){echo $cat_success;} ?>
                                <form class="form-horizontal dropzone" action="" method="post">
                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-3 form-control-label">Menu Title</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="cat_title" class="form-control" value="<?php echo $row['title'];?>">
                                        </div>
                                    </div>


                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-3 form-control-label">Menu Link</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="cat_link" class="form-control" value="<?php echo $row['page_link'];?>">
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
                                $cat_insert = "UPDATE team_member SET title = '$cat_title' , page_link = '$cat_link' WHERE id = '$id'";
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
        $post_delete = "DELETE FROM team_member WHERE id='$id'";
        $delete_sql  = query($post_delete); 
        if (!$delete_sql) {
            die("DELETION ERROR " . mysqli_error($dbconn));
        }else {
            header("Location: team_member.php");
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
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php 

                                    $select_cat = "SELECT * FROM team_member";
                                    $cat_sql    = query($select_cat);
                                    while ($row = mysqli_fetch_assoc($cat_sql)):

                                ?>

                                        <tr>
                                            <td><span class="text-primary"><?php echo $row['id'] ?></span></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['position'] ?></td>
                                            <td> <img style="width: 150px;" src="<?php echo $row['image'] ?>" alt="ERROR!"></td>
                                            <td class="td-actions">
                                                <a href="team_members_edit.php?edit=<?php echo $row['id'] ?>"><i class="la la-edit edit"></i></a>
                                                <a href="team_members.php?delete=<?php echo $row['id'] ?>"><i class="la la-close delete"></i></a>
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
