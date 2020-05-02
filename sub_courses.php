<?php include "includes/header.php" ?>
	<body>
		
		<nav class="navbar navbar-bg navbar-expand-sm sticky-top">
			<h3 class="navbar-brand"><a style="font-size:20px;" href="courses.php"><i class="fa fa-arrow-circle-left" style="font-size:50px;"></a></i></h3>
		</nav>
		
		
		<!-- course name start -->
		
		<div class="sub_course">
			<div class="container">
				<?php 
					if (isset($_GET['view'])) {
						$id = $_GET['view'];
	                    $selectCourese = "SELECT * FROM course_category WHERE id = '$id'";
	                    $courseSql     = query($selectCourese);
	                    $row = mysqli_fetch_assoc($courseSql);
	                    $course_title = $row['course_title'];
					}
                ?>
				<div class="row">
					<div class="col-md-12 p-5">
						<center><h3 class="dot-border" style="font-weight:bold;"><?php echo $row['course_title']; ?></h3></center>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-8 p-3">
						<h3><span style="color:orange; font-weight:bold;">Why we</span> learn ?</h3>
					<p style="color:black; text-align:justify;"><?php echo $row['course_discription']; ?></p><br /><br />
						<img src="admin/<?php echo $row['course_image']; ?>" alt=""  style=" width:500px;"/>
					</div>
					<div class="col-md-4 p-3">
					<div class="row">
						<div class="card-body" style="background-color:#fcfafa;"> 
							
							<h3 class="card-title" style="font-size:18px; font-weight:bold; color:green; float:left;"> Course fees</h3>
							<h3 class="card-title" style="font-size:18px; font-weight:bold; color:red; float:right;">$<?php echo $row['course_fee']; ?></h3><br /><br />
							
							<h3 style="font-size:18px; font-weight:bold;"><span style="color:red;">What item in</span> this course</h3>
							<h5 style="color:#af0404;"></h5>
							<?php 
                                $selectItem = "SELECT * FROM course_item where courseTitle = '$course_title'";
                                $itemQuery  = query($selectItem);
                                while($itemRow    = mysqli_fetch_assoc($itemQuery)):
                            ?>
							<i class="fa fa-check" style="color:#af0404;"> <?php echo $itemRow['courseItem']; ?></i><br />
						<?php endwhile ?>
						<h3 style="font-size:18px; font-weight:bold;">Course <span style="color:red;">Validity</span></h3>
						<i class="fa fa-check" style="color:#af0404;"> <?php echo $row['course_validate']; ?> month</i><br />
							
						<h3 style="font-size:18px; font-weight:bold;">Contact us <span style="color:red;"></span></h3>
						<i class="fa fa-map-marker" style="color:#af0404;"> Dig road, jashore ICT care</i><br />
							<i class="fa fa-envelope" style="color:#af0404;"> ICT care 2015@gmail.com</i><br />
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>	
		
		<br /><br /><br />
		
		
		<!-- course name end -->
		
		
		
		
		<!-- Map End -->
<?php include "includes/footer.php" ?>