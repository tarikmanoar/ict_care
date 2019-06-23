
		
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