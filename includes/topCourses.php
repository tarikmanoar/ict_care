
		
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
					<div class="col-md-2">
						<div class="top-course-button">
							<span style="float:right;"><a class="btn btn-default my-btn btn-color" href="courses.php" role="button">VIEW MORE</a></span>
						</div>
					</div>
				</div>
				
				<div class="row">
				<?php 
                    $selectCourese = "SELECT * FROM course_category ORDER BY id DESC LIMIT 0,5";
                    $courseSql     = query($selectCourese);
                    while ($row = mysqli_fetch_assoc($courseSql)):
                ?>				
					<div class="col-md-4 section-padding ">
						<div class="card-area-img portfolio-item">
							<img src="2015/<?php echo $row['course_image']; ?>" alt="" />
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
			</div>
		</div>
		
		<!-- Top-corse end -->
		