
		<!-- Footer Start -->
		<footer class="footer-area">
			<div class="container">
				<div class="row">
					<div class="col-center">
						<div class="col-md-6 col-sm-8">
							<div class="newsletter-col">
								<?php 
								if (isset($_POST['subs'])) {
									$email = $_POST['inputMail'];
									$insertEmail = query("INSERT INTO newsletter(email) VALUES('$email')");
									if (!$insertEmail) {
										echo "Sorry Enter A Valid Email";
									}else {
										header("Location: index.php");
										echo "success";
									}
								}
								?>
								<h4>Join our mailing list and never miss an update!</h4>
								<form action="" method="post">
									<div class="input-group">
										<input placeholder="Email Address" class="form-control" name="inputMail" type="email">
										<span class="input-group-btn">
											<button type="submit" class="btn" name='subs'>Subscribe</button>
										</span>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-4 offset-md-4">
						<div class="footer-col hi-icon-wrap hi-icon-effect-4 hi-icon-effect-4b">
							<!-- Footer Favicon in here -->
                   		</div> 
					</div>
				</div>
			</div>
		</footer>
		
		<section class="footer-copy-right text-white">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<p>&copy; 2018. Designed by <a href="https://www.ictcare.com.bd" target="_blank">ICT CARE.</a> All Rights Reserved.</p>
					</div>
				</div>
			</div>
		</section>
		<!-- Footer Style Background ten End -->
		
		<a href="" class="scrollup" style="display: none;">Scroll</a>		
	</body>	
	
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/typer.js"></script>
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/jquery.sticky.js"></script>
	<script src="assets/js/main.js"></script>
	<script>
	$(window).load(function(e) {
        $("#bn1").breakingNews({
			effect		:"slide-h",
			autoplay	:true,
			timer		:3000,
			color		:"red"
		});
    });
 </script>	
</html>			