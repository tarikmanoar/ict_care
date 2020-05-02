		<!-- Slider area -->
		<div class="owl-carousel homepage-slides">
			<?php 
				$select_slider = "SELECT * FROM slider WHERE slider_show = 'yes'";
                $slider_sql    = query($select_slider);
                while ($row = mysqli_fetch_assoc($slider_sql)):
            ?>
			<div class="slider-area" style="background:url('2015/<?php echo $row['slider_image'] ?>') no-repeat;background-size: cover;min-height: 588px;height: 100%;width: 100%;">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 offset-md-3">
							<div class="slider-area-content text-center">
								<h1><?php echo $row['slider_title'] ?><br />
									<span class="typer" id="main" data-words="<?php echo $row['slider_typer'] ?>" data-colors="gold" data-delay="100" data-deleteDelay="1000"></span>
									<span class="cursor" data-owner="main"></span>
								</h1>
								<p><?php echo $row['slider_dis'] ?></p>
								<!-- <button type="button" class="btn">portfolio</button> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile ?>
		</div>
		<!-- Slider area end -->