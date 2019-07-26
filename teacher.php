<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>
		
		<section class="site-hero site-sm-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(assets/img/hero-area-bg.jpg); height:300px;">
			
			<div class="container">
				<div class="row align-items-center justify-content-center site-hero-sm-inner">
					<div class="col-md-7 text-center">
						
						<div class="mb-5 element-animate">
							<h3 class="mb-2" style="margin-top:100px;color:white;">TEACHERS</h3><br/>
							<p class="bcrumb"><a href="index.html">Home</a> <span class="sep ion-android-arrow-dropright px-2"></span> 
								<i class="fa fa-arrow-circle-right  text-white" style="height:20px;"></i>
							<span class="current text-white" style="padding:10px;">Teachers</span></p>
							
						</div>
						
					</div>
				</div>
			</div>
		</section>
		<!-- END section -->
	
		
		
		<!-- Teacher-area	Start	 -->

		
		<!-- Teacher-area	Start	 -->
		<section id="speakers" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="teachers-title">
							<h1>Our <span style="color:#f32d3a;">Teachers</span></h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br /> Morbi bibendum venenatis mollis.</p>
						</div>
					</div>
					<?php 



                    $select_teacher = "SELECT * FROM teachers";
                    $cat_sql    = query($select_teacher);
                    while($row = mysqli_fetch_assoc($cat_sql)):

					?>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="speakers-member wow fadeIn animated" data-wow-delay="0.1s" style="visibility: visible;-webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
							<div class="member-img">
								<img src="2015/<?php echo $row['images'] ?>" alt="ERROR!">
							</div>
							<div class="member-desc" style=" min-height: 200px;">
								<h3><?php echo $row['name'] ?></h3>
								<h5><?php echo $row['position'] ?></h5>
								<p><?php echo $row['about'] ?></p>
								<div class="social-icon">
									<a class="social" href="<?php echo $row['facebook'] ?>contactFrom.php" target="_blank"><i class="fa fa-facebook"></i></a>
									<a class="social" href="<?php echo $row['twitter'] ?>contactFrom.php" target="_blank"><i class="fa fa-twitter"></i></a>
									<a class="social" href="<?php echo $row['linkedin'] ?>contactFrom.php" target="_blank"><i class="fa fa-linkedin"></i></a>
									<a class="social" href="<?php echo $row['dribble'] ?>contactFrom.php" target="_blank"><i class="fa fa-dribbble"></i></a>
									<a class="social" href="<?php echo $row['behance'] ?>contactFrom.php" target="_blank"><i class="fa fa-behance"></i></a>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile ?>
					<!-- <div class="more-btn text-center">
						<a href="http://demo.graygrids.com/themes/impression/speakers.html" class="btn btn-common wow fadeInUp" data-wow-delay="0.3s" style="visibility: hidden; -webkit-animation-name: none; -moz-animation-name: none; animation-name: none;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">show more</a>
					</div> -->
				</div>
			</div>
		</section>
		<!-- Teacher-area	End	 -->
		<!-- Teacher-area	End	 -->
		<!-- Teacher-area	Start	 -->
	
					<!-- carousel  Events end -->
				</div>
			</div>
		</div>
		<!-- Eventt area End --> 
		
		<!-- Contact Start -->
		
		
		
		
<?php include "includes/footer.php" ?>	