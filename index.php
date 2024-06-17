<?php
// Include necessary files for login and customer signup
include("function/login.php");
include("function/customer_signup.php");
include("db/dbconn.php");

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Shoe Store</title>
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
        #footer {
            position: relative;
            padding-bottom: 30px; 
        }
        .admin-button {
            position: absolute;
            bottom: 10px;
            right: 10px;
        }
        .password-prompt {
            position: fixed;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fefefe;
            border: 1px solid #888;
            padding: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="header">
        <img src="img/logo.jpg">
        <label>Stepping Stone</label>
        <ul>
            <li><a href="#signup" data-toggle="modal">Sign Up</a></li>
            <li><a href="#login" data-toggle="modal">Login</a></li>
        </ul>
    </div>

    <div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h3 id="myModalLabel">Login...</h3>
        </div>
        <div class="modal-body">
            <form method="post">
                <center>
                    <input type="email" name="email" placeholder="Email" style="width:250px;">
                    <input type="password" name="password" placeholder="Password" style="width:250px;">
                </center>
        </div>
        <div class="modal-footer">
            <input class="btn btn-primary" type="submit" name="login" value="Login">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
            </form>
        </div>
    </div>

    <div id="signup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h3 id="myModalLabel">Sign Up Here...</h3>
        </div>
        <div class="modal-body">
            <center>
            <form action="" method="post">
                <input type="text" name="firstname" placeholder="Firstname" required>
                <input type="text" name="mi" placeholder="Middle Initial" maxlength="1" required>
                <input type="text" name="lastname" placeholder="Lastname" required>
                <input type="text" name="address" placeholder="Address" style="width:430px;" required>
                <input type="text" name="country" placeholder="Province" required>
                <input type="text" name="zipcode" placeholder="ZIP Code" required maxlength="4">
                <input type="text" name="mobile" placeholder="Mobile Number" maxlength="11">
                <input type="text" name="telephone" placeholder="Telephone Number" maxlength="8">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
            </center>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-primary" name="signup" value="Sign Up">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
            </form>
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

        <div id="carousel">
            <div id="myCarousel" class="carousel slide">
                <div class="carousel-inner">
                    <div class="active item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner4.jpg" class="carousel"></div>
                    <div class="item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner5.jpg" class="carousel"></div>
                    <div class="item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner6.jpg" class="carousel"></div>
                </div>
                <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
            </div>
        </div>

        <div id="video">
            <video controls autoplay width="445px" height="300px">
                <source src="video/commercial5.mp4" type="video/mp4">
            </video>
        </div>

        <div id="content">
            <div id="product" style="position:relative; margin-top:30%;">
                <center><h2><legend>Feature Items</legend></h2></center>
                <br />
                <?php
                $query = $conn->query("SELECT * FROM product WHERE category='feature' ORDER BY product_id DESC") or die (mysqli_error($conn));

                while($fetch = $query->fetch_array())
                {
                    $pid = $fetch['product_id'];

                    $query1 = $conn->query("SELECT * FROM stock WHERE product_id = '$pid'") or die (mysqli_error($conn));
                    $rows = $query1->fetch_array();

                    $qty = $rows['qty'];
                    if($qty <= 5){
                        continue; // Skip products with quantity <= 5
                    } else {
                        echo "<div class='float'>";
                        echo "<center>";
                        echo "<a href='details.php?id=".$fetch['product_id']."'><img class='img-polaroid' src='photo/".$fetch['product_image']."' height = '300px' width = '300px'></a>";
                        echo " ".$fetch['product_name']."";
                        echo "<br />";
                        echo "P ".$fetch['product_price']."";
                        echo "<br />";
                        echo "<h3 class='text-info' style='position:absolute; margin-top:-90px; text-indent:15px;'> Size: ".$fetch['product_size']."</h3>";
                        echo "</center>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
        </div>

        <br />
    </div>
    <br />

    <div id="footer">
        <div class="foot">
            <label style="font-size:17px;"> Copyright &copy; </label>
            <p style="font-size:25px;">Stepping Stone Inc. is only a University Project</p>
        </div>

        <div id="foot">
            <h4>Links</h4>
            <ul>
                <a href="https://www.facebook.com/profile.php?id=61560603782585"><li>Facebook</li></a>
            </ul>
        </div>
        
        <!-- Admin button -->
        <div class="admin-button">
            <button onclick="togglePasswordPrompt()">Admin</button>
        </div>
    </div>

    <!-- Password Prompt -->
    <div id="passwordPrompt" class="password-prompt" style="display: none;">
        <p>Enter the admin secret password:</p>
        <input type="password" id="adminPassword" />
        <button onclick="checkPassword()">Submit</button>
        <button onclick="closePasswordPrompt()">Cancel</button>
    </div>

    <script>
        function togglePasswordPrompt() {
            const prompt = document.getElementById('passwordPrompt');
            prompt.style.display = prompt.style.display === 'block' ? 'none' : 'block';
        }

        function closePasswordPrompt() {
            document.getElementById('passwordPrompt').style.display = 'none';
        }

        function checkPassword() {
            const password = document.getElementById('adminPassword').value;
            if (password === "SteptheStone") {
                window.location.href = "admin/admin_index.php";
            } else {
                alert("Access denied.");
            }
            closePasswordPrompt();
        }
    </script>
</body>
</html>
