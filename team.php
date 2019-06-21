<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>	
		<section class="site-hero site-sm-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(assets/img/hero-area-bg.jpg); height:300px;">
			
			<div class="container">
				<div class="row align-items-center justify-content-center site-hero-sm-inner">
					<div class="col-md-7 text-center">
						
						<div class="mb-5 element-animate">
							<h3 class="mb-2" style="margin-top:100px;color:white;">OUR TEAM</h3><br/>
							<p class="bcrumb"><a href="index.html">Home</a> <span class="sep ion-android-arrow-dropright px-2"></span> 
								<i class="fa fa-arrow-circle-right  text-white" style="height:20px;"></i>
							<span class="current text-white" style="padding:10px;">TEAM</span></p>
							
						</div>
						
					</div>
				</div>
			</div>
		</section>
		
		
		<!-- Team-area		 -->
		
		<!-- Team-area		 -->
		<div class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="teacher-title">
							<h1>Our <span style="color:#f32d3a;">Team</span></h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br /> Morbi bibendum venenatis mollis. </p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="top-course-button">
							<span style="float:right;"><a class="btn btn-default my-btn btn-color" href="#" role="button">VIEW MORE</a></span>
						</div>
					</div>
				</div>
				
				<div class="row">
					<?php 

					$select_cat = "SELECT * FROM team_member";
				    $cat_sql    = query($select_cat);
				    while($row = mysqli_fetch_assoc($cat_sql)):
					?>
					<div class="col-md-3 col-12 col-xl-3 fw-600">
						<div class="speaker-col wow fadeInLeft  animated" data-wow-duration=".5s" data-wow-delay="0s" style="visibility: visible; animation-duration: 0.5s; animation-delay: 0s; animation-name: fadeInLeft;min-height: 390px;">
							<div class="speaker-box" style="min-height: 215px;">
								<div class="pic">
									<img src="admin/<?php  echo $row['image']; ?>" alt="">
									<ul class="social">
										<li><a href="<?php  echo $row['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<li><a href="<?php  echo $row['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="speaker-info">
								<h6><?php  echo $row['name']; ?></h6>
								<span><?php  echo $row['position']; ?></span>
							</div>
						</div>
					</div>
				<?php endwhile ?>
				</div>
				
				<!-- <div class="section-padding"></div> -->
			</div>
		</div>
		<!-- Team-area	End	 -->
				
				<!-- <div class="section-padding"></div> -->
			</div>
		</div>
		<!-- Team-area	End	 -->
	
<?php include "includes/footer.php" ?>