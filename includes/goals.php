
		
		<!-- Archeb YourGoll -->
		
		<div class="area-bg">
			<div class="section-padding">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="goals-area-title">
								<h1>Achieave Your <span style="color:#f32d3a;">Goals</span></h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br /> Morbi bibendum venenatis mollis.</p>
							</div>
						</div>
					</div>
					
					<div class="row">
						<?php 

							$selectGoal = query("SELECT * FROM goal");
                            while($row = mysqli_fetch_assoc($selectGoal)):

						?>
						<div class="col-md-4">
							<div class="goals-area-border portfolio-item" style="min-height: 230px;">
								<img src="2015/<?php echo $row['image'] ?>" alt="" />
								<h6><?php echo $row['title'] ?></h6>
								<p><?php echo $row['details'] ?></p>
							</div>
						</div>
					<?php endwhile ?>
					</div>
				</div>
			</div>
		</div>
		