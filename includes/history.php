
		
		<!--History Area -->
		<?php 

			$select_history = "SELECT * FROM history";
			$history_sql 	= query($select_history);
			$row 			= mysqli_fetch_assoc($history_sql);

		?>
		<div class="area-bg" id="ABOUT">
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
								<h1><?php echo $row['history_title'];?></h1>
								<p style="line-height: 2;">
									<?php echo stringLimit($row['history_dis'],500) ?>
									<span style="float:right;"><a class="btn btn-default my-btn btn-color" href="about.php" role="button">VIEW MORE</a></span>
								</p>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>