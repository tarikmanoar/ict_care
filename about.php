<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>	
		    <!-- END header -->

    <section class="site-hero site-sm-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(assets/img/hero-area-bg.jpg); height:300px;">
			
      <div class="container">
        <div class="row align-items-center justify-content-center site-hero-sm-inner">
         	<div class="col-md-7 text-center">
						
						<div class="mb-5 element-animate">
							<h3 class="mb-2" style="margin-top:100px;color:white;">ABOUT</h3><br/>
							<p class="bcrumb"><a href="index.php">Home</a> <span class="sep ion-android-arrow-dropright px-2"></span> 
								<i class="fa fa-arrow-circle-right  text-white" style="height:20px;"></i>
							<span class="current text-white" style="padding:10px;">about</span></p>
							
						</div>
						
					</div>
        </div>
      </div>
    </section>
    <!-- END section -->
	<!--History Area -->
		<?php 

			$select_history = "SELECT * FROM history";
			$history_sql 	= query($select_history);
			$row 			= mysqli_fetch_assoc($history_sql);

		?>		
		<div class="area-bg">
			<div class="section-padding">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="popup-video-area">
								<img src="assets/img/hero-area-bg.jpg" alt="" />
								<a id="history-area-video" href="<?php echo $row['tube_link'];?>"><i class="fa fa-play"></i></a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="history-area-content">
								<h1>Hist<span style="color:red;">ory</span></h1>
								<p style="line-height: 2;"><?php echo $row['history_dis'];?>
								</p>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
   
   <div class="col-md-8 offset-md-2">
      <div class="col-md-4 offset-md-4">
	    <h1 style="color:#e6bc3a;margin-top:80px;font-family: 'Roboto', sans-serif; font-weight: 500;">What <span style="color:red">to do</span></h1></div>
		<p style="color:#4c4c4c;; margin-top:30px;line-height:2;text-align: justify;">In the year of 2015 and date of 1st May ICT Care officially started their journey at the heart of the 1st digital city in Bangladesh which is Jessore. ICT Care  located  DIG Road, Jessore. From the beginning of its journey ICT Care is working hard to achieve the goal of Bangladesh Government to make the country digital in every way. In this continuation ICT Care is providing many kinds of computer courses, selling personal computers,socialIn the year of 2015 and date of 1st May ICT Care officially started their journey at the heart of the 1st digital city in Bangladesh which is Jessore. ICT Care is located at DIG Road, Jessore. From the beginning of its journey ICT Care is working hard to achieve the goal of Bangladesh Government to make the country digital in every way. In this continuation ICT Care is providing many kinds of computer courses, ..</p>
	  
   </div>
		
		<!-- dolna -->
		
    <div class="site-section element-animate">
      <div class="container">
        
        <div class="row" style="margin-top:150px;">
          <div class="col-md-6">
		      <h4 style="color:#e6bc3a;margin-top:10px;font-family: 'Roboto', sans-serif; font-weight: 500;">OUR HAPPY <span Style="color:red;">CLIENT</span></h4>
<?php 

$select_client = "SELECT * FROM client WHERE position = 'client'";
$client_sql 	= query($select_client);
while($row= mysqli_fetch_assoc($client_sql)):

?>
            <div class="accordion block-8" id="accordion">
              <div class="accordion-item">
                <h3 class="mb-0 heading">
                  <a class="btn-block" data-toggle="collapse" href="#<?php echo $row['id'] ?>" role="button" aria-expanded="false" aria-controls="collapseOne" style="font-size:18px; margin-top:20px;"><?php echo $row['name'] ?><span class="icon"></span></a>
                </h3>
                <div id="<?php echo $row['id'] ?>" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="body-text">
                    <p style="color:black;text-align: justify;"><?php echo $row['about'] ?></p>
                  </div>
                </div>
              </div> <!-- .accordion-item -->

            </div>
<?php endwhile ?>
          </div>
          	<!-- Esponser -->
		    <div class="col-md-6">
			<h4 style="color:#e6bc3a;margin-top:10px;font-family: 'Roboto', sans-serif; font-weight: 500;">OUR <span style="color:red;">ESPONCER</span></h4>
<?php 

$select_client = "SELECT * FROM client WHERE position = 'sponcer'";
$client_sql 	= query($select_client);
while($row= mysqli_fetch_assoc($client_sql)):

?>
            <div class="accordion block-8" id="accordion1">
              <div class="accordion-item">
                <h3 class="mb-0 heading">
                  <a class="btn-block" data-toggle="collapse" href="#<?php echo $row['id'] ?>" role="button" aria-expanded="false" aria-controls="collapseOne" style="font-size:18px; margin-top:20px;"><?php echo $row['name'] ?><span class="icon"></span></a>
                </h3>
                <div id="<?php echo $row['id'] ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion1">
                  <div class="body-text">
                    <p style="color:black;text-align: justify;"><?php echo $row['about'] ?></p>
                  </div>
                </div>
              </div> <!-- .accordion-item -->

            </div>
<?php endwhile ?>
          </div>
		
    </div>
	
	     
	</div>
	<!-- end -->
	<div class="headingSection" style="margin-top: 200px;"></div>
<?php include "includes/footer.php" ?>