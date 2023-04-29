<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
$flag=false;
?>
<?php
    $custid = $_SESSION['id'];
    if(isset($_POST['submit'])) {
        if(!empty($_POST['rate1'])) {
            $q1 = $_POST['rate1'];
        } 
        if(!empty($_POST['rate2'])) {
            $q2 = $_POST['rate2'];
        }
        if(!empty($_POST['rate3'])) {
            $q3 = $_POST['rate3'];
        }
        if(!empty($_POST['rate4'])) {
            $q4 = $_POST['rate4'];
        }
        if(!empty($_POST['rate5'])) {
            $q5 = $_POST['rate5'];
        }
        if(!empty($_POST['rate6'])) {
            $q6 = $_POST['rate6'];
        }
        if(!empty($_POST['rate7'])) {
            $q7 = $_POST['rate7'];
        }
        if(!empty($_POST['rate8'])) {
            $q8 = $_POST['rate8'];
        }
        if(!empty($_POST['rate9'])) {
            $q9 = $_POST['rate9'];
        }
        if(!empty($_POST['rate10'])) {
            $q10 = $_POST['rate10'];
        }
        else {
            echo "Please select values";
        }

        $con = mysqli_connect("localhost","root","","pestokill");
    $fetch = "INSERT INTO feedback (`customer_id`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `suggestions`) VALUES ('$custid', '$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10')";
    $run = mysqli_query($con, $fetch);
    if($run)
        {
            $flag = true;
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
                <a href="cd_main.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="cd_profile.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
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
                    class="list-group-item list-group-item-action bg-transparent second-text active">
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
                    <h2 class="fs-2 m-0">Feedback</h2>
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
                if($flag)
                {
                    echo '<div class="alert alert-success py-1 col-5"role="alert">    
                        <i class="fas fa-check me-2"></i><span>Thank you for your feedback!!!</span>
                        </div>';
                }
                ?>
                <div class="row my-4">
                    <h3 class="fs-4 mb-3">Help us Grow...</h3>
                    <form class="row" method="POST">
                        <div class="col">
                            <table class="table table-info rounded shadow-sm  table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" width="50">#</th>
                                        <th scope="col" width="70%">Questions</th>
                                        <th scope="col" width="30%">Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            How convenient was it book an inspection?
                                        </td>
                                        <td>
                                            <input class="rate" type="radio" name="rate1" value="1">&ensp;<label> 1 </label>
				                            <input class="rate" type="radio" name="rate1" value="2">&ensp;<label> 2 </label>
				                            <input class="rate" type="radio" name="rate1" value="3">&ensp;<label> 3 </label>
				                            <input class="rate" type="radio" name="rate1" value="4">&ensp;<label> 4 </label>
				                            <input class="rate" type="radio" name="rate1" value="5">&ensp;<label> 5 </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            How was the inspection carried out by our professional?
                                        </td>
                                        <td>
                                            <input class="rate" type="radio" name="rate2" value="1">&ensp;<label> 1 </label>
				                            <input class="rate" type="radio" name="rate2" value="2">&ensp;<label> 2 </label>
				                            <input class="rate" type="radio" name="rate2" value="3">&ensp;<label> 3 </label>
				                            <input class="rate" type="radio" name="rate2" value="4">&ensp;<label> 4 </label>
				                            <input class="rate" type="radio" name="rate2" value="5">&ensp;<label> 5 </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>
                                            Are you satisfied with service carried out by the our professionals?
                                        </td>
                                        <td>
                                            <input class="rate" type="radio" name="rate3" value="1" >&ensp;<label> 1 </label>
				                            <input class="rate" type="radio" name="rate3" value="2">&ensp;<label> 2 </label>
				                            <input class="rate" type="radio" name="rate3"  value="3">&ensp;<label> 3 </label>
				                            <input class="rate" type="radio" name="rate3"  value="4">&ensp;<label> 4 </label>
				                            <input class="rate" type="radio" name="rate3" value="5" >&ensp;<label> 5 </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>
                                            Are you satisfied with scheduling date and time of service turns?
                                        </td>
                                        <td>
                                            <input class="rate" type="radio" name="rate4" value="1">&ensp;<label> 1 </label>
				                            <input class="rate" type="radio" name="rate4"value="2">&ensp;<label> 2 </label>
				                            <input class="rate" type="radio" name="rate4" value="3">&ensp;<label> 3 </label>
				                            <input class="rate" type="radio" name="rate4" value="4">&ensp;<label> 4 </label>
				                            <input class="rate" type="radio" name="rate4" value="5">&ensp;<label> 5 </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>
                                            Your problems were resolved after all the service turns?
                                        </td>
                                        <td>
                                            <input class="rate" type="radio" name="rate5" value="1">&ensp;<label> 1 </label>
				                            <input class="rate" type="radio" name="rate5" value="2">&ensp;<label> 2 </label>
				                            <input class="rate" type="radio" name="rate5" value="3">&ensp;<label> 3 </label>
				                            <input class="rate" type="radio" name="rate5" value="4">&ensp;<label> 4 </label>
				                            <input class="rate" type="radio" name="rate5" value="5">&ensp;<label> 5 </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>
                                            How much satisfied are you with the overall service provided by PESTOKILL employees?
                                        </td>
                                        <td>
                                            <input class="rate" type="radio" name="rate6" value="1">&ensp;<label> 1 </label>
				                            <input class="rate" type="radio" name="rate6" value="2">&ensp;<label> 2 </label>
				                            <input class="rate" type="radio" name="rate6" value="3">&ensp;<label> 3 </label>
				                            <input class="rate" type="radio" name="rate6" value="4">&ensp;<label> 4 </label>
				                            <input class="rate" type="radio" name="rate6" value="5">&ensp;<label> 5 </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>
                                            Compared to our competitors, how was our pricing?
                                        </td>
                                        <td>
                                            <input class="rate" type="radio" name="rate7" value="1">&ensp;<label> 1 </label>
				                            <input class="rate" type="radio" name="rate7" value="2">&ensp;<label> 2 </label>
				                            <input class="rate" type="radio" name="rate7" value="3">&ensp;<label> 3 </label>
				                            <input class="rate" type="radio" name="rate7" value="4">&ensp;<label> 4 </label>
				                            <input class="rate" type="radio" name="rate7" value="5">&ensp;<label> 5 </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>
                                            Compared to our competitors, how was our service?
                                        </td>
                                        <td>
                                            <input class="rate" type="radio" name="rate8" value="1">&ensp;<label> 1 </label>
				                            <input class="rate" type="radio" name="rate8" value="2">&ensp;<label> 2 </label>
				                            <input class="rate" type="radio" name="rate8" value="3">&ensp;<label> 3 </label>
				                            <input class="rate" type="radio" name="rate8" value="4">&ensp;<label> 4 </label>
				                            <input class="rate" type="radio" name="rate8" value="5">&ensp;<label> 5 </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td>
                                            How much would you like to recommend PESTOKILL to people you know?
                                        </td>
                                        <td>
                                            <input class="rate" type="radio" name="rate9" value="1">&ensp;<label> 1 </label>
				                            <input class="rate" type="radio" name="rate9" value="2">&ensp;<label> 2 </label>
				                            <input class="rate" type="radio" name="rate9" value="3">&ensp;<label> 3 </label>
				                            <input class="rate" type="radio" name="rate9" value="4">&ensp;<label> 4 </label>
				                            <input class="rate" type="radio" name="rate9" value="5">&ensp;<label> 5 </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">10</th>
                                        <td colspan="4">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here"
                                                    id="floatingTextarea2" name="rate10" style="height: 100px" required></textarea>
                                                <label for="floatingTextarea2">Your Suggestions</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input class="btn btn-success" type="submit" value="Submit" name="submit">
                        </div>
                    </form>
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

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>