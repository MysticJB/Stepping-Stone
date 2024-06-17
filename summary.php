<?php
include("function/session.php");
include("db/dbconn.php");
?>
<html>
<head>
    <title>Stepping Stone</title>
    <link rel="icon" href="img/logo.jpg" />
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all">
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
        $query = $conn->query("SELECT * FROM customer WHERE customerid = '$id'") or die(mysqli_error());
        $fetch = $query->fetch_array();
        ?>

        <ul>
            <li><a href="function/logout.php"><i class="icon-off icon-white"></i>logout</a></li>
            <li>Welcome:&nbsp;&nbsp;&nbsp;<a href="#profile" data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $fetch['firstname']; ?>&nbsp;<?php echo $fetch['lastname'];?></a></li>
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
            $query = $conn->query("SELECT * FROM customer WHERE customerid = '$id'") or die(mysqli_error());
            $fetch = $query->fetch_array();
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

        <form method="post" class="well" style="background-color:#fff; overflow:hidden;">
            <table class="table" style="width:50%;">
                <label style="font-size:25px;">Summary of Order/s</label>
                <tr>
                    <th><h5>Quantity</h5></td>
                    <th><h5>Product Name</h5></td>
                    <th><h5>Size</h5></td>
                    <th><h5>Price</h5></td>
                </tr>

                <?php
                $t_id = $_GET['tid'];
                $query = $conn->query("SELECT * FROM transaction WHERE transaction_id = '$t_id'") or die(mysqli_error());
                $fetch = $query->fetch_array();

                $amnt = $fetch['amount'];
                $t_id = $fetch['transaction_id'];

                $query2 = $conn->query("SELECT * FROM transaction_detail LEFT JOIN product ON product.product_id = transaction_detail.product_id WHERE transaction_detail.transaction_id = '$t_id'") or die(mysqli_error());
                while($row = $query2->fetch_array()){

                $pname = $row['product_name'];
                $psize = $row['product_size'];
                $pprice = $row['product_price'];
                $oqty = $row['order_qty'];

                echo "<tr>";
                echo "<td>".$oqty."</td>";
                echo "<td>".$pname."</td>";
                echo "<td>".$psize."</td>";
                echo "<td>".$pprice."</td>";
                echo "</tr>";
                }
                ?>

            </table>
            <legend></legend>
            <h4>TOTAL: Php <?php echo $amnt; ?></h4>
        </form>

        <div class='pull-right'>
            <a href='home.php' class='btn btn-inverse btn-lg'>Continue Shopping</a>
        </div>
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
