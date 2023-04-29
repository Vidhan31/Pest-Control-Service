<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;


    
}
$flag=false;
?>
<!-- To update address, city, state and pin -->
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $address = $_REQUEST['address'];
    $id = $_REQUEST['id'];
    $city = $_REQUEST['city'];
    $state = $_REQUEST['state'];
    $pin = $_REQUEST['pin'];
    // $flag = false;

    $con = mysqli_connect("localhost","root","","pestokill");
    $update = "UPDATE customer SET cust_address='$address', cust_state='$state', cust_pin='$pin', cust_city='$city' WHERE cust_id='$id'";
    $run = mysqli_query($con, $update);
    if($run)
    {
        $flag = true;
        $_SESSION['address'] = $address;
        $_SESSION['id'] = $id;
        $_SESSION['city'] = $city;
        $_SESSION['state'] = $state;
        $_SESSION['pin'] = $pin;
    }
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="cd_style.css" />
    <link rel="icon" href="icons/logo.png">
    <title>PESTOKILL | Dashboard</title>
</head>

<body>

    <!-- main content div [contains sidebar, content title bar and actual content bar] -->
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading py-4 border-bottom">
                <img src="icons/logo_name.png" width="200" height="45">
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="cd_main.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="cd_profile.php"
                    class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-user me-2"></i>Profile</a>
                <a href="cd_inspect.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-calendar-check me-2"></i>Book Inspection</a>
                <a href="cd_order_history.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-history me-2"></i>Order history</a>
                <a href="cd_services.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-bug me-2"></i>Upcoming Services</a>
                <a href="cd_feedback.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-comments me-2"></i>Feedback</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- content-title bar start -->
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Profile</h2> 
                    
                </div>
                
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php echo $_SESSION['name']?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                
            </nav>
            <!-- content-title bar end -->

            <!-- actual content start -->
            <div class="container-fluid px-4">
            <?php
                if($flag){
                    echo '<div class="alert alert-success py-1 col-4" role="alert">    
                        <i class="fas fa-check me-2"></i><span>Profile updated successfully!!!</span>
                        </div>';
                }   
                else{

                }           
            ?>
                <div class="mb-4">
                    <h3 class="fs-4 mb-3">Personal Info</h3>
                    <form class="row g-3" method="POST">
                        <div class="col-6">
                            <label for="Id" class="form-label">PESTOKILL ID</label>
                            <input class="form-control" type="text" name="id" value="<?php echo $_SESSION['id']; ?>"
                                aria-label="readonly input example" readonly>
                        </div>
                        <div class="col-6">
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control" type="text" value="<?php echo $_SESSION['name']; ?>" name="name"
                                aria-label="readonly input example" readonly>
                        </div>
                        <div class="col-6">
                            <label for="Mail" class="form-label">Email</label>
                            <input type="email" class="form-control" value="<?php echo $_SESSION['mail']; ?>" name="mail"
                                aria-label="readonly input example" readonly>
                        </div>
                        <div class="col-6">
                            <label for="CustType" class="form-label">Customer Type</label>
                            <input type="text" class="form-control" value="<?php echo $_SESSION['type']; ?>"
                                name="type" aria-label="readonly input example" readonly>
                        </div>
                        <div class="col-6">
                            <label for="Mob" class="form-label">Contact No.</label>
                            <input type="text" class="form-control" value="<?php echo $_SESSION['mobile']; ?>" name="mob"
                                aria-label="readonly input example" readonly>
                        </div>
                        <div class="col-12">
                            <label for="Address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address"
                                value="<?php echo $_SESSION['address']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="City" class="form-label">City</label>
                            <input type="text" class="form-control" value="<?php echo $_SESSION['city']; ?>" name="city">
                        </div>
                        <div class="col-md-6">
                            <label for="State" class="form-label">State</label>
                            <input type="text" class="form-control" value="<?php echo $_SESSION['state']; ?>"
                                name="state">
                        </div>
                        <div class="col-4">
                            <label for="Pin" class="form-label">Pin Code</label>
                            <input type="text" class="form-control" value="<?php echo $_SESSION['pin']; ?>" name="pin">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>

                    </form>
                </div>
            </div>
            <!-- actual content end -->

        </div>
        <!-- page content end -->
    </div>
    <!-- main content div [contains sidebar, content title bar and actual content bar] ends -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>