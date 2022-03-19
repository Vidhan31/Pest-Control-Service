
<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "pestokill";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
    die("Error". mysqli_connect_error());
}
else{
	//echo "success";
}

$sql = "SELECT * FROM customer";
$result = mysqli_query($conn, $sql);

// Find number of records
$num = mysqli_num_rows($result);
//echo $num;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Customers</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script type="text/javascript">"https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"</script>
     <!-- Latest compiled and minified CSS -->
    



</head>

<body>
   
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="img-removebg-preview.png" style="height: 190px; width: 150px; padding-left: 10px;">
                <h5 style="text-align: center;">PESTOKILL <br> Services India Pvt. Ltd.</h5>
            </div>

            <ul class="list-unstyled components">
                
                <li class="active">
                    <a href="Dashboard.php">Dashboard</a>
                    
                </li>
                <li>
                <a href="document-generation.php">Documents</a>
                </li>
                <li>
                    <a href="Inspections_page.php">Inspections</a>
                    
                </li>
                <li>
                    <a href="customer.php">Customer</a>
                </li>
                <li>
                    <a href="Employee_page.php">Employee</a>
                </li>
                <li>
                    <a href="order_history.php">Order History</a>
                </li>
                <li>
                    <a href="upcoming_services.php">Upcoming Services</a>
                </li>
            </ul>

    <div class="container">
        <div class="row">
            
        
                <!-- Fluid width widget -->        
             <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-calendar"></span>
                        Upcoming Events
                    </h3>
                </div>
                <br>
                <div class="panel-body">
                    <ul class="media-list">
                        <li class="media">
                            <div class="media-left">
                                <div class="panel panel-danger text-center date">
                                    <div class="panel-heading month">
                                        <span class="panel-title strong">
                                            Mar
                                        </span>
                                    </div>
                                    <div class="panel-body day text-danger">
                                        23
                                    </div>
                                </div>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    Abc
                                </h4>
                                <p>
                                    Abcjbgujh
                                </p>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <div class="panel panel-danger text-center date">
                                    <div class="panel-heading month">
                                        <span class="panel-title strong">
                                            Jan
                                        </span>
                                    </div>
                                    <div class="panel-body text-danger day">
                                        16
                                    </div>
                                </div>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    qwert
                                </h4>
                                <p>
                                    dggdsdh
                                </p>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <div class="panel panel-danger text-center date">
                                    <div class="panel-heading month">
                                        <span class="panel-title strong all-caps">
                                            Dec
                                        </span>
                                    </div>
                                    <div class="panel-body text-danger day">
                                        8
                                    </div>
                                </div>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    Praes
                                </h4>
                                <p>
                                    Sed gfty
                                </p>
                            </div>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-default btn-block">More Events »</a>
                </div>
            </div>
            <!-- End fluid width widget --> 
            
        
    </div>
</div>

        </nav>

        <!-- Page Content  -->
        <div id="content" style="width:100%;">
            <nav class="navbar navbar-expand-xl navbar-dark " style="background-color: #80c342;">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn" style="background-color: #80c342;">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" style="height: 40px; width: 40px;">
                                <a class="pc-head-link  arrow-none mr-0"  href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" alt="user-image" class="user-avtar" style="border-radius: 20px;">
                        </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">LogOut</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <h1></h1>
          <!-- Page Content-->
           <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Customer Details</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" style="table-layout: inherit;">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Customer ID</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Customer Type</th>
                                    <th scope="col">Mobile Number</th>
                                    <th scope="col">email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">City</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Pin Code</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                            		while ($rows = mysqli_fetch_assoc($result)) {
                            	?>
                                <tr>
                                    <td><?php echo $rows['cust_id'];?></td>
                                    <td><?php echo $rows['cust_name'];?></td>
                                    <td><?php echo $rows['cust_type'];?></td>
                                    <td><?php echo $rows['cust_mobile'];?></td>
                                    <td><?php echo $rows['cust_mail'];?></td>
                                    <td><?php echo $rows['cust_address'];?></td>
                                    <td><?php echo $rows['cust_city'];?></td>
                                    <td><?php echo $rows['cust_state'];?></td>
                                    <td><?php echo $rows['cust_pin'];?></td>
                                    
                                <?php
                                }
                                ?>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5"> <span class="text-muted text-sm">Showing <?php echo $num ?> items</span> </div>
                </div>


            <!-- Page Content end -->


           
        </div>
    </div>
      
      
   
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <script>
    var myDate = new Date();
    var hrs = myDate.getHours();

    var greet;

    if (hrs < 12)
        greet = 'Good Morning!';
    else if (hrs >= 12 && hrs <= 17)
        greet = 'Good Afternoon!';
    else if (hrs >= 17 && hrs <= 24)
        greet = 'Good Evening!';

    document.getElementById('lblGreetings').innerHTML ='<b>'+greet+'</b> Welcome to PestoKill India!';
</script> 
</body>

</html>