		<div class="container">
			<div class="row">
				<div class="col-md-12">							
					<div class="menu-area">
						<nav class="navbar navbar-bg navbar-expand-lg">
							<h5 class="navbar-brand" ><a href=""><img src="assets/img/logo.png" alt="" /></a></h5>
							<button class="navbar-toggler bg-waring" type="button" data-toggle="collapse" data-target="#collapsibleNavbar2">
								<span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
							</button>
							<div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar2">
								<ul class="navbar-nav">
								<?php 

									$nav_item = "SELECT * FROM category";
									$nav_query = query($nav_item);
									while ($row = mysqli_fetch_assoc($nav_query)):
								?>     
									<li class="nav-item"><a href="<?php echo $row['page_link'] ?>" class="nav-link active"><?php echo $row['title'] ?></a></li>
								<?php endwhile ?>
								</ul>

							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>


		
