<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>	
		
		<section class="site-hero site-sm-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(assets/img/hero-area-bg.jpg); height:300px;">
			
			<div class="container">
				<div class="row align-items-center justify-content-center site-hero-sm-inner">
					<div class="col-md-7 text-center">
						
						<div class="mb-5 element-animate">
							<h3 class="mb-2" style="margin-top:100px;color:white;">EVENTS</h3><br/>
							<p class="bcrumb"><a href="index.html">Home</a> <span class="sep ion-android-arrow-dropright px-2"></span> 
								<i class="fa fa-arrow-circle-right  text-white" style="height:20px;"></i>
							<span class="current text-white" style="padding:10px;">Events</span></p>
							
						</div>
						
					</div>
				</div>
			</div>
		</section>
		<!-- END section -->
		
		<!-- Teacher-area	Start	 -->
		<div class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="top-course-title">
							<h1 style="font-weight:bold;">Our <span style="color:#f32d3a;">Events </span></h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br /> Morbi bibendum venenatis mollis. </p>
						</div>
					</div>
				</div>
				
				<div class="row">

				<?php 


				$select_cat = "SELECT * FROM event";
	            $cat_sql    = query($select_cat);
	            while ($row = mysqli_fetch_assoc($cat_sql)):
				?>				
					<div class="col-md-4 section-padding ">
						<div class="card-area-img portfolio-item">
							<img src="2015/<?php echo $row['image']; ?>" alt="ERROR!" />
						</div>
						<div class="card-area-content">
							<h5 class="text-dark"><?php echo $row['title']; ?></h5>
							<p><?php echo $row['description']; ?></p><br />
							<div class="ebooknow">
								<span style="float:right;"><a href="events_sub.php?view=<?php echo $row['id']; ?>" class="btn btn-default ebutton readmore">View Details</a></span>	
								
							</div>
						</div>
					</div>
				<?php endwhile ?>
				</div>
			</div>
		</div>
		<!-- Teacher-area	End	 -->
		<!-- Eventt area End --> 
		
		<!-- Contact Start -->
		
		
		
			<!-- Map End -->
<?php include "includes/footer.php" ?>