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
                    <h2 class="page-header-title">Categories</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item active">Categories</li>
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

                        <form class="form-horizontal dropzone">
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">User Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="username" class="form-control">
                                </div>
                            </div>


                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Password</label>
                                <div class="col-lg-9">
                                    <input type="text" name="password" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input type="text" name="email" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Image</label>
                                <div class="col-lg-9">
                                    <input type="file" name="photo" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label"></label>
                                <div class="col-lg-9">
                                    <button type="submit" name="submit" class="btn btn-primary">Add User</button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>



            <div class="col-xl-6 col-6">
                <div class="widget has-shadow">
                    <div class="widget-body">

                        <div class="widget-body">
                            <div class="table-responsive">
                                <table id="sorting-table" class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Username</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <tr>
                                            <td><span class="text-primary">054-01-FR</span></td>
                                            <td>Lori Baker</td>
                                            <td class="td-actions">
                                                <a href="#"><i class="la la-edit edit"></i></a>
                                                <a href="#"><i class="la la-close delete"></i></a>
                                            </td>
                                        </tr>



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
