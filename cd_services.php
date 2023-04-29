<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>

<?php

$con = mysqli_connect("localhost", "root", "", "pestokill");
$id = $_SESSION['id'];

$join = "SELECT orders.order_date, services.service_name, services.service_desc from orders INNER JOIN services on orders.serv_id=services.service_id where orders.customer_id='$id';";
$run = mysqli_query($con, $join);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <a href="cd_profile.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-user me-2"></i>Profile</a>
                <a href="cd_inspect.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-calendar-check me-2"></i>Book Inspection</a>
                <a href="cd_order_history.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-history me-2"></i>Order history</a>
                <a href="cd_services.php" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-bug me-2"></i>Upcoming Services</a>
                <a href="cd_feedback.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-comments me-2"></i>Feedback</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content starts-->
        <div id="page-content-wrapper">
            <!-- content-title bar start -->
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Upcoming Services</h2>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php echo $_SESSION['name'] ?>
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

                <div class="row my-4">
                    <h3 class="fs-4 mb-3">Pending Services</h3>
                    <div class="col">

                        <?php
                        if (mysqli_num_rows($run) > 0) {
                            $html = '<table class="table table-info rounded shadow-sm  table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col" >Date</th>
                                                    <th scope="col" >Service name</th>

                                                    <th scope="col" >Service Description</th>
                                                    <!-- <th scope="col" width="20%">Schedule Date and Time</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>';
                            

                            while ($row = mysqli_fetch_array($run)) {
                                $html .= '<tr><td>' . $row['order_date'] . '</td><td>' . $row['service_name'] . '</td><td>' . $row['service_desc'] . '</td></tr>';
                            }
                            $html .= '</tbody></table>';
                        } else {
                            $html = "Data not found";

                        }
                        echo $html;

                        ?>

                    </div>
                </div>

            </div>
            <!-- actual content end -->

        </div>
        <!-- page content ends -->
    </div>
    <!-- main content div [contains sidebar, content title bar and actual content bar] ends -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>