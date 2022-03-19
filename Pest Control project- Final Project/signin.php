<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phoneno = $_POST["phoneno"];
    $address = $_POST["address"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $pincode = $_POST["pincode"];
    $customertype = $_POST["customertype"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    //$exists=false;

    // Check whether this username exists
    $existSql = "SELECT * FROM `customer` WHERE cust_mail = '$email'";

    $existSql1 = "SELECT * FROM `customer` WHERE cust_mobile = '$phoneno'";

    $result = mysqli_query($conn, $existSql);
    $result1 = mysqli_query($conn, $existSql1);
    
    $numExistRows = mysqli_num_rows($result);
    $numExistRows1 = mysqli_num_rows($result1);

    if ($numExistRows + $numExistRows1 > 0) {
        // $exists = true;
        $showError = "Username Already Exists";
    } else {
        if (($password == $confirm_password)) {

            $sql = "INSERT INTO `customer` ( `cust_name`, `cust_mail`, `cust_mobile`, `cust_address`, `cust_state`, `cust_city`, `cust_pin`, `cust_type`, `cust_pass`) VALUES ('$name', '$email', '$phoneno', '$address', '$state', '$city', '$pincode', '$customertype', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pestokill || Sign-In</title>

    <!-- Required CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/barfiller.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- Script for captcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <!-- favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <script>
        function passwordcheck() {
            var password = document.getElementById('password').value;
            var confirm_password = document.getElementById('confirm_password').value;

            if (confirm_password != password) {
                alert("Passwords do not match!!! ")
            }
        }
    </script>
</head>

<body>
    <div class="preloader">
        <span class="preloader-spin"></span>
    </div>

    <div class="site">

        <!-- This is the header section. This should be same in all the pages. -->
        <header>
            <button onclick="topFunction()" id="topBtn" class="go-to-top-button" title="Go to top">Top</button>
            <div class="container">
                <div class="row">
                    <div class="col-6 col-sm-3 logo-column">
                        <a href="index.php" class="logo">
                            <img src="assets/img/logo.png" alt="logo">
                        </a>
                    </div>
                    <div class="col-6 col-sm-9 nav-column clearfix">
                        <div class="right-nav">
                            <div class="header-social">
                                <a href="#" class="fa fa-facebook"></a>
                                <a href="#" class="fa fa-twitter"></a>
                                <a href="#" class="fa fa-instagram"></a>
                                <a href="login.php"><button type="button" class="btn btn-outline-primary">Log
                                        In</button></a>
                                <a href="signin.php"><button type="button" class="btn btn-outline-success">Sign
                                        In</button></a>
                            </div>
                        </div>
                        <nav id="menu" class="d-none d-lg-block">
                            <ul>
                                <li class="">
                                    <a href="index.php">Home</a>
                                </li>
                                <li><a href="about.php">About Us</a></li>
                                <!-- <li><a href="portfolio.php">Portfolio</a></li> -->
                                <li class="">
                                    <a href="service.php">Sevices</a>
                                </li>
                                <li class="">
                                    <a href="blog.php">Blog</a>
                                </li>
                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- This is the header section. This should be same in all the pages. -->



        <!-- This is the banner section. This contains the banner image and text for the page. -->
        <div class="page-title sp" style="background-image: url(assets/img/page-title.jpg)">
            <div class="container text-center">
                <h2>Customer Sign-In</h2>
            </div>
        </div>
        <!-- This is the banner section. This contains the banner image and text for the page. -->


        <!-- This is the sign up section. This contains the sign up form for the user. -->
        <section class="sign-up-form">
            <div class="signup-form">
                <form action="" method="post" class="form-horizontal">
                    <div class="col-xs-8 col-xs-offset-4">
                        <h2>Sign Up</h2>
                    </div>
                    <?php
                        if ($showAlert) {
                            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success!</strong> Your account is now created and you can login
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div> ';
                                }
                        if ($showError) {
                            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error!</strong> ' . $showError . '
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div> ';
                                }
                    ?>
                    <div class="form-group">
                        <label class="control-label col-xs-4">Name</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="name" required="required" maxlength="20">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-4">Email Address</label>
                        <div class="col-xs-8">
                            <input type="email" class="form-control" name="email" required="required" maxlength="30">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-4">Phone No.</label>
                        <div class="col-xs-8">
                            <input type="tel" class="form-control" name="phoneno" required="required" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-4">Address</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="address" placeholder="" required="required" maxlength="255">
                        </div>
                        <label class="control-label col-xs-4">State</label>
                        <div class=" control-label col-xs-8">
                            <select name="state" id="state" class="form-control">
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                        </div>
                        <label class="control-label">City</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="city" placeholder="" required="required" maxlength="20">
                        </div>
                        <label class="control-label">Pin Code</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="pincode" placeholder="" required="required" maxlength="6">
                        </div>
                    </div>
                    <div class="control-label form-group">
                        <label class="control-label col-xs-4" for="customertype">Customer Type</label>
                        <div class="col-xs-8">
                            <select name="customertype" id="customertype" class="form-control">
                                <option value="commercial">Commercial</option>
                                <option value="domestic">Domestic</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-4">Password</label>
                        <div class="col-xs-8">
                            <input type="password" class="form-control" name="password" id="password" required="required" maxlength="20">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-4">Confirm Password</label>
                        <div class="col-xs-8">
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" required="required" maxlength="20">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-8 col-xs-offset-4">
                            <div class="g-recaptcha" data-sitekey="6LfioqIeAAAAALAaxiKGIxFAlzx-71W8AjpZBjju"></div>

                            <button type="submit" class="btn btn-primary btn-lg" onclick="passwordcheck()">Sign Up</button>
                        </div>
                    </div>
                    <div class="text-center">Already have an account? <a href="login.php">Login here</a></div>

                </form>
            </div>

        </section>
        <!-- This is the sign up section. This contains the sign up form for the user. -->


        <!-- This is the footer of the page. this has to same in all the pages. -->
        <footer>
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6  footer_widget">
                            <div class="inner">
                                <h4>About</h4>
                                <p>We at Pestokill established this company with one vision in mind: To bring innovation
                                    and convenience to the Pest control industry.</p>
                                <p>We have experienced technician who have tackled all types of pests in
                                    all kinds of premises from residential, housing societies, restaurants, factories,
                                    offices, hospitals, and many more.

                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 footer_widget">
                            <div class="inner">
                                <h4>Quick Links</h4>
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="service.php">Services</a></li>
                                    <li><a href="blog.php">Blogs</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                    <li><a href="login.php">Log In</a></li>
                                    <li><a href="signin.php">Sign In</a></li>
                                    <li><a href="faq.php">FAQs</a></li>

                                </ul>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 footer_widget">
                            <div class="inner">
                                <h4>Address</h4>
                                <h5>Pestokill India Pvt. Ltd.</h5>
                                <p>A-88, 1st floor, <br> Madhu Vihar, Patparganj <br> Delhi-92 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="">
                            <div class="copyright-txt">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </footer>
        <!-- This is the footer of the page. this has to same in all the pages. -->




    </div>

    <!--Required JS files-->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/owl.carousel.min.js"></script>
    <script src="assets/js/vendor/isotope.pkgd.min.js"></script>
    <script src="assets/js/vendor/jquery.barfiller.js"></script>
    <script src="assets/js/vendor/loopcounter.js"></script>
    <script src="assets/js/vendor/slicknav.min.js"></script>
    <script src="assets/js/active.js"></script>
    <script>




    </script>

</body>

</html>