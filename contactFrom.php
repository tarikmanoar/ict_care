		
		<!-- Contact_form Start -->
		
		<div class="container" id="contact.html"> <br> <br>
			<div class="row m-0">
				<div class="col-md-4 col-xs-12">
					<div class="contact-col contact-infobox">
						<i class="fa fa-map-marker"></i>
						<p style="color: #000;">Our Office Address: DIG Road,</p>
						<p style="color: #000;">Ghope,Jessore</p>
					</div>
				</div>
				<div class="col-md-4 col-12">
					<div class="contact-col contact-infobox">
						<i class="fa fa-phone"></i>
						<p style="color: #000;">+8801999921788</p>
						<p style="color: #000;">+8801999921788</p>
					</div>
				</div>
				<div class="col-md-4 col-12">
					<div class="contact-col contact-infobox">
						<i class="fa fa-envelope-o"></i>
						<p style="color: #000;">ictcare2015@gmail.com</p>
						<p style="color: #000;">shouvikrahman@gmail.com</p>
					</div>
				</div>
			</div>
			
		</div>
		<!-- form start -->
		<div class="row contact-form-row m-0">
			<div class="col-md-8 offset-md-2">
				<div class="contact-col">
					<form id="" method="post" action="">
						<div class="row">
							<div class="col-md-6">
								<input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
							</div>
							<div class="col-md-6">
								<input type="email" name="email" id="email" class="form-control" placeholder="Your Email" required>
							</div>
							<div class="col-md-12">
								<input type="text" name="subject" class="form-control" placeholder="Subject" id="subject" required>
							</div>
							<div class="col-md-12">
								<div class="contact-textarea">
									<textarea class="form-control" rows="6" placeholder="Wright Message" id="message" name="message" required></textarea>
									<button class="btn btn-default my-btn btn-color text-center" type="submit" value="Submit Form" name="submit">Send Message</button>
								</div>
							</div>
							<div id="form-messages"></div>
						</div>
					</form><br><br>
					
				</div>

				<?php 

				if (isset($_POST['submit'])) {
					$name = $_POST['name'];
					$subject = $_POST['subject'];
					$mailFrom = $_POST['email'];
					$message = $_POST['message'];

					$mailTo = "admin@ictcare.com.bd";
					$header = "From: ".$mailFrom;
					$txt = "You have received an email from ".$name.".\n\n".$message;



					mail($mailTO,$subject,$txt,$header);
					header("Location: team.php");

				}

				?>
			</div>
		</div>
		
		<!-- Contact_form End -->
		
