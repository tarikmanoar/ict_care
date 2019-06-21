
		
		<!-- Student Review area START-->
		
		<div class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="pepole-appriciation-title">
							<h1>Stdunte’s <span style="color:#f32d3a;">Archive </span></h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br /> Proin ac vulputate</p>
						</div>
					</div>					
				</div>
			</div>
		</div>	
		<div class="owl-carousel student-slider-area">
			<?php 

			$select_cat = "SELECT * FROM review";
            $cat_sql    = query($select_cat);
            while($row = mysqli_fetch_assoc($cat_sql)):
			?>
			<div class="student-slider">
				<div class="container">
					<div class="row">
						<div class="col-md-6 offset-md-3">
							<div class="popup-video-area">
								<img src="admin/<?php echo $row['image'];?>" alt="ERROR!" />
								<a id="student-area-video" href="<?php echo $row['video'];?>"><i class="fa fa-play"></i></a>
							</div>	
						</div>
					</div>
				</div>
			</div>
		<?php endwhile ?>
		</div>
		
		
		<!-- Student Review area END-->
