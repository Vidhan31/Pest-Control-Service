<?php
    $login = false;
    $showError = false;

    if (array_key_exists('custlogin', $_POST)) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'partials/_dbconnect.php';
            $email = $_POST["email"];
            $password = $_POST["password"];


            $sql = "Select * from customer where cust_mail='$email' AND cust_pass='$password'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                $login = true;
                session_start();
                $row = $result->fetch_assoc();
                $_SESSION['loggedin'] = true;

                $_SESSION['id'] = $row["cust_id"];
                $_SESSION['name'] = $row["cust_name"];
                $_SESSION['mail'] = $row["cust_mail"];
                $_SESSION['mobile'] = $row["cust_mobile"];
                $_SESSION['address'] = $row["cust_address"];
                $_SESSION['state'] = $row["cust_state"];
                $_SESSION['city'] = $row["cust_city"];
                $_SESSION['pin'] = $row["cust_pin"];
                $_SESSION['type'] = $row["cust_type"];

                header("location: cd_main.php");
            } else {
                $showError = "Invalid Credentials";
            }
        }
    }


    if (array_key_exists('adminlogin', $_POST)) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'partials/_dbconnect.php';
            $email = $_POST["email"];
            $password = $_POST["password"];


            $sql = "Select * from client where client_mail='$email' AND client_pass='$password'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                $login = true;
                session_start();
                $row = $result->fetch_assoc();
                $_SESSION['loggedinadmin'] = true;
                $_SESSION['client_id'] = $row["client_id"];
                $_SESSION['client_email'] = $row["client_id"];
                $_SESSION['client_name'] = $row["client_name"];
                
                echo $row;

                header("location: Dashboard.php");
            } else {
                $showError = "Invalid Credentials";
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
    <title>Pestokill || Login</title>

    <!-- Required CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/barfiller.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
</head>

<body>
    <div class="preloader">
        <span class="preloader-spin"></span>
    </div>
    <div class="site">
        <?php
            if ($login) {
                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> You are logged in
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
                <h2>Login</h2>
            </div>
        </div>
        <!-- This is the banner section. This contains the banner image and text for the page. -->


        <!-- This is the login section of the page. this contains the 2 login of the page. -->
        <div class=" sp bg2">
            <div class="container login-container">
                <div class="row">
                    <div class="col-md-6 login-form-1">
                        <h3>Customer Login</h3>
                        <form method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Your Email *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Your Password *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit" value="Login" name="custlogin">
                            </div>
                            <div class="form-group">
                                <a href="#" class="ForgetPwd" onclick="forgotpassword()">Forget Password?</a>

                            </div>
                            <div class="form-group">

                                <a href="signin.php" class="Sign-In button">Sign-In </a>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 login-form-2">
                        <h3>Bussiness Login</h3>
                        <form method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Your Email *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Your Password *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit" value="Login" name="adminlogin">
                            </div>
                            <div class="form-group">

                                <a href="#" class="ForgetPwd" value="Login" onclick="forgotpassword()">Forget
                                    Password?</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div>
        <!-- This is the login section of the page. this contains the 2 login of the page. -->

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

</body>

</html>