<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>	
		
		<section class="site-hero site-sm-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(assets/img/hero-area-bg.jpg); height:300px;">
			
			<div class="container">
				<div class="row align-items-center justify-content-center site-hero-sm-inner">
					<div class="col-md-7 text-center">
						
						<div class="mb-5 element-animate">
							<h3 class="mb-2" style="margin-top:100px;color:white;">COURSES</h3><br/>
							<p class="bcrumb"><a href="index.html">Home</a> <span class="sep ion-android-arrow-dropright px-2"></span> 
								<i class="fa fa-arrow-circle-right  text-white" style="height:20px;"></i>
							<span class="current text-white" style="padding:10px;">Courses</span></p>
							
						</div>
						
					</div>
				</div>
			</div>
		</section>
		<!-- END section -->
		
		
		
		
		<!-- top course area -->
		
		<div class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="top-course-title">
							<h1>Top <span style="color:#f32d3a;">Courses </span></h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br /> Morbi bibendum venenatis mollis. </p>
						</div>
					</div>
				</div>
				
				<div class="row">
				<?php 
                    $selectCourese = "SELECT * FROM course_category ORDER BY id DESC";
                    $courseSql     = query($selectCourese);
                    while ($row = mysqli_fetch_assoc($courseSql)):
                ?>				
					<div class="col-md-4 section-padding ">
						<div class="card-area-img portfolio-item">
							<img src="admin/<?php echo $row['course_image']; ?>" alt="" />
						</div>
						<div class="card-area-content">
							<h5 class="text-dark text-center"><?php echo $row['course_title']; ?></h5>
							<p> <?php echo stringLimit($row['course_discription'],180 ) ?></p>
							<div class="ebooknow">
								<span style="float:left;"><a class="btn btn-default my-btn btn-color" href="#" role="button">Apply Now</a></span>
								<span style="float:right;"><a href="sub_courses.php?view=<?php echo $row['id']; ?>" class="btn btn-default ebutton readmore">View Details</a></span>	
								
							</div>
						</div>
					</div>
				<?php endwhile ?>
				</div>
				
				
		<!-- Map End -->
<?php include "includes/footer.php" ?>