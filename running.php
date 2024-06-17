<?php
	include("function/login.php");
	include("function/customer_signup.php");
	include("db/dbconn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Stepping Stone</title>
	<link rel="icon" href="img/logo.jpg">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/carousel.js"></script>
	<script src="js/button.js"></script>
	<script src="js/dropdown.js"></script>
	<script src="js/tab.js"></script>
	<script src="js/tooltip.js"></script>
	<script src="js/popover.js"></script>
	<script src="js/collapse.js"></script>
	<script src="js/modal.js"></script>
	<script src="js/scrollspy.js"></script>
	<script src="js/alert.js"></script>
	<script src="js/transition.js"></script>
	<style>
		.nav {
			text-align: center;
		}

		.nav ul {
			display: inline-block;
			padding: 0;
			margin: 0;
			list-style: none;
		}

		.nav li {
			display: inline;
			margin-right: 20px;
		}

		.nav a {
			text-decoration: none;
			font-size: 18px;
			color: #000;
		}

		.nav a:hover {
			color: #007bff;
		}

		.nav i {
			margin-right: 5px;
		}
	</style>
</head>
<body>
	<div id="header">
		<img src="img/logo.jpg" alt="Stepping Stone Logo">
		<label>Stepping Stone</label>
		<ul>
			<li><a href="#signup" data-toggle="modal">Sign Up</a></li>
			<li><a href="#login" data-toggle="modal">Login</a></li>
		</ul>
	</div>

	<!-- Login Modal -->
	<div id="login" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 id="loginModalLabel">Login...</h3>
				</div>
				<div class="modal-body">
					<form method="post">
						<center>
							<input type="email" name="email" placeholder="Email" class="form-control" required>
							<input type="password" name="password" placeholder="Password" class="form-control" required>
						</center>
				</div>
				<div class="modal-footer">
					<input class="btn btn-primary" type="submit" name="login" value="Login">
					<button class="btn btn-danger" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Login Before Purchasing Modal -->
	<div id="login1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginBeforePurchasingLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 id="loginBeforePurchasingLabel">Please login before purchasing...</h3>
				</div>
				<div class="modal-body">
					<form method="post">
						<center>
							<input type="email" name="email" placeholder="Email" class="form-control" required>
							<input type="password" name="password" placeholder="Password" class="form-control" required>
						</center>
				</div>
				<div class="modal-footer">
					<p style="float:left;">No account? <a href="#signup" data-toggle="modal">Sign up here!</a></p>
					<input class="btn btn-primary" type="submit" name="login" value="Login">
					<button class="btn btn-danger" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Sign Up Modal -->
	<div id="signup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 id="signupModalLabel">Sign Up Here...</h3>
				</div>
				<div class="modal-body">
					<form method="post">
						<center>
							<input type="text" name="firstname" placeholder="Firstname" class="form-control" required>
							<input type="text" name="mi" placeholder="Middle Initial" maxlength="1" class="form-control" required>
							<input type="text" name="lastname" placeholder="Lastname" class="form-control" required>
							<input type="text" name="address" placeholder="Address" class="form-control" required>
							<input type="text" name="country" placeholder="Province" class="form-control" required>
							<input type="text" name="zipcode" placeholder="ZIP Code" maxlength="4" class="form-control" required>
							<input type="text" name="mobile" placeholder="Mobile Number" maxlength="11" class="form-control">
							<input type="text" name="telephone" placeholder="Telephone Number" maxlength="8" class="form-control">
							<input type="email" name="email" placeholder="Email" class="form-control" required>
							<input type="password" name="password" placeholder="Password" class="form-control" required>
						</center>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="signup" value="Sign Up">
					<button class="btn btn-danger" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div id="container">
		<div class="nav">
			<ul>
				<li><a href="index.php"><i class="icon-home"></i>Home</a></li>
				<li><a href="product.php"><i class="icon-th-list"></i>Product</a></li>
				<li><a href="aboutus.php"><i class="icon-bookmark"></i>About Us</a></li>
				<li><a href="contactus.php"><i class="icon-inbox"></i>Contact Us</a></li>
				<li><a href="privacy.php"><i class="icon-info-sign"></i>Privacy Policy</a></li>
				<li><a href="faqs.php"><i class="icon-question-sign"></i>FAQs</a></li>
			</ul>
		</div>

		<div class="nav1">
			<ul>
				<li><a href="product.php">Basketball</a></li>
				<li>|</li>
				<li><a href="football.php">Football</a></li>
				<li>|</li>
				<li><a href="running.php" class="active" style="color:#111;">Running</a></li>
			</ul>
		</div>

		<div id="content">
			<br>
			<br>
			<div id="product">
				<?php
					$query = $conn->query("SELECT * FROM product WHERE category='running' ORDER BY product_id DESC") or die(mysqli_error($conn));
					while($fetch = $query->fetch_array()) {
						$pid = $fetch['product_id'];
						$query1 = $conn->query("SELECT * FROM stock WHERE product_id = '$pid'") or die(mysqli_error($conn));
						$rows = $query1->fetch_array();
						$qty = $rows['qty'];
						if($qty > 5) {
							echo "<div class='float'>";
							echo "<center>";
							echo "<a href='details.php?id=".$fetch['product_id']."'><img class='img-polaroid' src='photo/".$fetch['product_image']."' height='300' width='300'></a>";
							echo "<p>".$fetch['product_name']."</p>";
							echo "<p>P ".$fetch['product_price']."</p>";
							echo "<h3 class='text-info' style='position:absolute; margin-top:-90px; text-indent:15px;'>Size: ".$fetch['product_size']."</h3>";
							echo "</center>";
							echo "</div>";
						}
					}
				?>
			</div>
		</div>
		<br>
	</div>
	<br>
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px;">Copyright &copy;</label>
			<p style="font-size:25px;">Stepping Stone Inc. is only a University Project</p>
		</div>

		<div id="foot">
			<h4>Links</h4>
			<ul>
				<li><a href="https://www.facebook.com/profile.php?id=61560603782585">Facebook</a></li>
			</ul>
		</div>
	</div>
</body>
</html>
