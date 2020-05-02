		
		
		<!-- Eventt area Start -->
		<div class="area-bg">
			<div class="section-padding">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="event-area-title">
								<h1>Our <span style="color:#f32d3a;">Events </span></h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br /> Morbi bibendum venenatis mollis. </p>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<!-- carousel  Events start -->
					<div class="owl-carousel event-slides">
						<?php 

						$selectEvent = query("SELECT * FROM event");
						while ($row = mysqli_fetch_assoc($selectEvent)):

						?>
						<div class="event-img">
							<img src="2015/<?php echo $row['image']; ?>" class="img-fluid" alt="" />
							<div class="event-hover">
								<h3><?php echo $row['title']; ?></h3>
								<p><?php echo $row['description']; ?></p>
							</div>
						</div>
					<?php endwhile ?>
					</div>
					<!-- carousel  Events end -->
				</div>
			</div>
		</div>
		<!-- Eventt area End -->