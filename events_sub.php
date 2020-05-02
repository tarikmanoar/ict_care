<?php include("includes/header.php") ?>
	<body>
		
		<nav class="navbar navbar-bg navbar-expand-sm sticky-top">
			<h3 class="navbar-brand"><a style="font-size:50px;" href="events.php"><i class="fa fa-arrow-circle-left"></i></a></h3>
			
		</nav>
		
		
		<div class="area-bg">
			<div class="section-padding">
				<div class="container">
					<div class="row">
						<?php 
							if (isset($_GET['view'])){
								$id = $_GET['view'];
								$selectEvent = query("SELECT * FROM event WHERE id='$id'");
								$row = mysqli_fetch_assoc($selectEvent);
						}
						?>
						<div class="col-md-8">
							<div class="event-area-title">
								<h2><?php echo $row['title']; ?></span></h2>
							</div>
							<div class="container m-0">
								<div class="row">
									<div class="col-md-5">
										<div class="img-event">
											<img src="admin/<?php echo $row['image']; ?>" class="img-fluid" style='width:200px;' alt="" />
										</div>
									</div>
									<div class="col-md-7">
										<div class="head-event">
										<p style="color:#000;"><h6><i class="fa fa-calendar"> <?php echo $row['date']; ?></i></h6></p>
										<p style="color:#000;"><i class="fa fa-map-marker"> <?php echo $row['location']; ?></i></p>
										<p style="color:#000;"><i class="fa fa-phone"> <?php echo '+880'.$row['phone']; ?></i></p>
										<p style="color:#000;"><i class="fa fa-envelope"> <?php echo $row['mail']; ?></i></p>
										
										</div>
									</div>
								</div>
								<br />
								<div class="row">
									<div class="col-md-12">
										<h4>Description :</h4>
										<p style="text-align:justify; color:#000;"><?php echo $row['description']; ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="event-area-title">
								<h4><span style="color:#f32d3a;">Location : </span></h4>
								<div class="location-events">
										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3667.907026354307!2d89.21264161492209!3d23.173593184876843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff106459b1208b%3A0x4ab9cc83bd98b92e!2sICT+Care!5e0!3m2!1sen!2sbd!4v1552539803555" width="100%" height="250" frameborder="1" style="border:0" allowfullscreen></iframe>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		<div class="area-bg">
			<div class="section-padding">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="event-area-title">
								<h1>Events <span style="color:#f32d3a;">Gallery </span></h1>
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
							<img src="admin/<?php echo $row['image']; ?>" class="img-fluid" alt="" />
						</div>
					<?php endwhile ?>
					</div>
					<!-- carousel  Events end -->
				</div>
			</div>
		</div>
		
				<!-- Map End -->
<?php include "includes/footer.php" ?>