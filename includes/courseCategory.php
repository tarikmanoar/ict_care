		
		<!-- Course CATEGORIES Start' -->
		
		<div class="area-bg" id="Courses">
			<div class="section-padding">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="course-title m-3">
								<h1>Course <span style="color:#f32d3a;">Categories</span></h1>
							</div>
						</div>
					</div>
					
					<div class="row">
						<?php 

						$selectCat = "SELECT * FROM course_category";
						$catQuery  = query($selectCat);
						while($row = mysqli_fetch_assoc($catQuery)):

						?>
						<div class="col-md-2 col-sm-6 col-xs-6">
							<div class="course-border contact-col contact-infobox">
								<a href="">
									<i class="fa <?php echo $row['course_icon']; ?>"></i>
									<p><?php echo $row['course_title']; ?></p>
								</a>								
							</div>
						</div>
						<?php endwhile ?>
					</div>
				</div>
			</div>
		</div>
		<!-- Course CATEGORIES End' -->