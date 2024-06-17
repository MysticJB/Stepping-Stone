<?php
	include("function/session.php");
	include("db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Stepping Stone</title>
	<link rel="icon" href="img/logo.jpg" />
	<link rel = "stylesheet" type = "text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-1.7.2.min.js"></script>
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
	<script src="js/bootstrap.min.js"></script>
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
		<img src="img/logo.jpg">
		<label>Stepping Stone</label>

			<?php
				$id = (int) $_SESSION['id'];
				$query = $conn->query ("SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
				$fetch = $query->fetch_array ();
			?>

			<ul>
				<li><a href="function/logout.php"><i class="icon-off icon-white"></i>logout</a></li>
				<li>Welcome:&nbsp;&nbsp;&nbsp;<a href="#profile"  data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $fetch['firstname']; ?>&nbsp;<?php echo $fetch['lastname'];?></a></li>
			</ul>
	</div>

	<div id="profile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h3 id="myModalLabel">My Account</h3>
		</div>
		<div class="modal-body">
			<?php
				$id = (int) $_SESSION['id'];
				$query = $conn->query ("SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
				$fetch = $query->fetch_array ();
			?>
			<center>
			<form method="post">
				<center>
					<table>
						<tr>
							<td class="profile">Name:</td><td class="profile"><?php echo $fetch['firstname'];?>&nbsp;<?php echo $fetch['mi'];?>&nbsp;<?php echo $fetch['lastname'];?></td>
						</tr>
						<tr>
							<td class="profile">Address:</td><td class="profile"><?php echo $fetch['address'];?></td>
						</tr>
						<tr>
							<td class="profile">Country:</td><td class="profile"><?php echo $fetch['country'];?></td>
						</tr>
						<tr>
							<td class="profile">ZIP Code:</td><td class="profile"><?php echo $fetch['zipcode'];?></td>
						</tr>
						<tr>
							<td class="profile">Mobile Number:</td><td class="profile"><?php echo $fetch['mobile'];?></td>
						</tr>
						<tr>
							<td class="profile">Telephone Number:</td><td class="profile"><?php echo $fetch['telephone'];?></td>
						</tr>
						<tr>
							<td class="profile">Email:</td><td class="profile"><?php echo $fetch['email'];?></td>
						</tr>
					</table>
				</center>
			</form>
			</center>
		</div>
		<div class="modal-footer">
			<a href="account.php?id=<?php echo $fetch['customerid']; ?>"><input type="button" class="btn btn-success" name="edit" value="Edit Account"></a>
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>

	<br>
	<div id="container">
		<div class="nav">
			<ul>
				<li><a href="home.php"><i class="icon-home"></i>Home</a></li>
				<li><a href="product1.php"><i class="icon-th-list"></i>Product</a></li>
				<li><a href="aboutus1.php"><i class="icon-bookmark"></i>About Us</a></li>
				<li><a href="contactus1.php"><i class="icon-inbox"></i>Contact Us</a></li>
				<li><a href="privacy1.php"><i class="icon-info-sign"></i>Privacy Policy</a></li>
				<li><a href="faqs1.php"><i class="icon-question-sign"></i>FAQs</a></li>
			</ul>
		</div>

		<form method="post" action="place_order.php" class="well" style="background-color:#fff;">
			<table class="table">
				<label style="font-size:25px;">My Cart</label>
				<tr>
					<th><h3>Image</h3></th>
					<th><h3>Product Name</h3></th>
					<th><h3>Size</h3></th>
					<th><h3>Quantity</h3></th>
					<th><h3>Price</h3></th>
					<th><h3>Add</h3></th>
					<th><h3>Remove</h3></th>
					<th><h3>Subtotal</h3></th>
				</tr>

				<?php
				if (isset($_GET['id'])) $id = $_GET['id'];
				else $id = 1;

				if (isset($_GET['action'])) $action = $_GET['action'];
				else $action = "empty";

				switch($action)
				{
					case "view":
						if (isset($_SESSION['cart'][$id]))
							$_SESSION['cart'][$id];
					break;
					case "add":
						if (isset($_SESSION['cart'][$id]))
							$_SESSION['cart'][$id]++;
						else
							$_SESSION['cart'][$id] = 1;
					break;
					case "remove":
						if (isset($_SESSION['cart'][$id]))
						{
							$_SESSION['cart'][$id]--;
							if ($_SESSION['cart'][$id] == 0)
								unset($_SESSION['cart'][$id]);
						}
					break;
					case "empty":
						unset($_SESSION['cart']);
					break;
				}

				if (isset($_SESSION['cart']))
				{
					$total = 0;
					foreach($_SESSION['cart'] as $id => $x)
					{
						$result = $conn->query("SELECT * FROM product WHERE product_id = $id");
						$myrow = $result->fetch_array();
						$name = $myrow['product_name'];
						$name = substr($name, 0, 40);
						$price = $myrow['product_price'];
						$image = $myrow['product_image'];
						$product_size = $myrow['product_size'];
						$line_cost = $price * $x;
						$total += $line_cost;

						echo "<tr class='table'>";
						echo "<td><h4><img height='70px' width='70px' src='photo/".$image."'></h4></td>";
						echo "<td><h4><input type='hidden' required value='".$id."' name='pid[]'> ".$name."</h4></td>";
						echo "<td><h4>".$product_size."</h4></td>";
						echo "<td><h4><input type='hidden' required value='".$x."' name='qty[]'> ".$x."</h4></td>";
						echo "<td><h4>".$price."</h4></td>";
						echo "<td><h4><a href='cart.php?id=".$id."&action=add'><i class='icon-plus-sign'></i></a></h4></td>";
						echo "<td><h4><a href='cart.php?id=".$id."&action=remove'><i class='icon-minus-sign'></i></a></h4></td>";
						echo "<td><h3>P ".$line_cost."</h3></td>";
						echo "</tr>";
					}

					echo "<tr>";
					echo "<td></td>";
					echo "<td></td>";
					echo "<td></td>";
					echo "<td></td>";
					echo "<td><h2>TOTAL:</h2></td>";
					echo "<td><strong><input type='hidden' value='".$total."' required name='total'><h2 class='text-danger'>P ".$total."</h2></strong></td>";
					echo "<td></td>";
					echo "<td><a class='btn btn-danger btn-sm pull-right' href='cart.php?action=empty'><i class='fa fa-trash-o'></i> Empty cart</a></td>";
					echo "</tr>";
				}
				else
				{
					echo "<font color='#111' class='alert alert-error' style='float:right'>Cart is empty</font>";
				}
				?>
			</table>

			<div class='pull-right'>
				<a href='home.php' class='btn btn-inverse btn-lg'>Continue Shopping</a>
				<?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
					<button name='pay_now' type='submit' class='btn btn-inverse btn-lg'>Purchase</button>
				<?php endif; ?>
			</div>
		</form>
	</div>

	<br />
	<br />
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px;"> Copyrght &copy; </label>
			<p style="font-size:25px;">Stepping Stone Inc. Is only a University Project</p>
		</div>
		<div id="foot">
			<h4>Links</h4>
			<ul>
				<a href="https://www.facebook.com/profile.php?id=61560603782585"><li>Facebook</li></a>
			</ul>
		</div>
	</div>
</body>
</html>
