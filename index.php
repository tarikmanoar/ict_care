<?php include "includes/header.php" ?>
<div class="row">
	<div class="col-md-12">
		<div class="breakingNews" id="bn1" style="background: #f44a5685;">
	    	<div class="bn-title"><h2>News the manaor</h2><span></span></div>
	    	<!-- <marquee  direction="up">The Name o</marquee> -->
	        <ul>
	        <?php 
		  		$selectNews = query("SELECT * FROM news ORDER BY id DESC ");
		  		if (mysqli_num_rows($selectNews) > 0){
		  				while ($row = mysqli_fetch_assoc($selectNews)) {
		  				    ?>
								<li><a href="#"><?php echo $row['newsTitle']; ?></a></li>
		  				    <?php
		  				}
		  			}
		  	?>
	        </ul>
	        <div class="bn-navi" style="right: 120px;">
	        	<span></span>
	            <span></span>
	        </div>
	        <div class="date" style=" float: right;background: #404040; padding: 7px; color: #fff; font-family: 'PT Sans', sans-serif;font-weight: bolder;border-radius: 25px 0px 25px 0px;">
	        	<?php echo date('d - M - Y'); ?>
	        </div>
    	</div>


<!-- 		<div class="progress" style="height:50px; font-size: 24px;">
		  <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:80px;height:50px;color: #fff">
		  	<b>News :</b>
		  </div>
		  <div class="progress-bar bg-light progress-bar-striped progress-bar-animated" style="width:100%;height:50px;color: #000">

		  	<?php 
		  		$selectNews = query("SELECT * FROM news ORDER BY id DESC ");
		  	?>
		  	<marquee onmouseover="this.stop();" onmouseout="this.start();">
		  		<?php 
		  			if (mysqli_num_rows($selectNews) > 0){
		  				while ($row = mysqli_fetch_assoc($selectNews)) {
		  				    echo $row['newsTitle']." "." " ;
		  				}
		  			}
		  		?>
		  	</marquee>

		  </div>

		</div> -->
	</div>
</div>
<?php include "includes/nav.php" ?>		
<?php include "includes/slider.php" ?>
		
<?php include "includes/history.php" ?>		
<?php include "includes/courseCategory.php" ?>		
<?php include "includes/topCourses.php" ?>		
<?php include "includes/team.php" ?>		
<?php include "includes/teacher.php" ?>		
<?php include "includes/goals.php" ?>		
<?php include "includes/studentReview.php" ?>		
<?php include "includes/event.php" ?>		
<?php include "includes/contactFrom.php" ?>		
		
		<!-- Map Start -->
		<div class="Container-fluid">
			<div class="row m-0 p-0">
				<div class="col-md-12">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1833.9534792367779!2d89.21373595791313!3d23.173595662020844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff106459b1208b%3A0x4ab9cc83bd98b92e!2sICT+Care!5e0!3m2!1sen!2sbd!4v1552375560189" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>				
		</div>
		<!-- Map End -->
<?php include "includes/footer.php" ?>