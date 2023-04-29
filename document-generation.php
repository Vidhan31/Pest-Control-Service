 <?php
  $html = ""; //this will put an empty  variable
  $list = "";
  $error = "";

  //makes connection to the database
  $conn = mysqli_connect("localhost", "root", "", "pestokill");
  if (!$conn) {
    die("Error" . mysqli_connect_error());
  }

  //runs a querry to fetch all the customers from db to display in list
  $res = mysqli_query($conn, "select * from customer");
  $row = mysqli_fetch_assoc($res);


  if (mysqli_num_rows($res) > 0) {
  } else {
    $list .= "Data not found";
  }
  
  if (isset($_POST['selectcustlist'])) {

    $selectOption = $_POST['selectcustlist'];
    // echo $selectOption;
    if ($selectOption == "Open this select menu") {

      $error= "Please select customer";
      
    } else {
      session_start();
      $_SESSION['varname'] = $selectOption;

      $sql = "Select * from customer where cust_id ='$selectOption'";
      $result = mysqli_query($conn, $sql);
      $row = $result->fetch_assoc();
      $html = '<style></style><br><br><table class="table">';
      $html .= '<tr>
    <td>ID</td>
    <td>Name</td>
    <td>Email</td>
    <td>Phone No.</td>
    <td>Address</td>
    <td>State</td>
    <td>City</td>
    <td>Pincode</td></tr>';
      $html .= '<tr><td>' . $row['cust_id'] . '</td>
    <td>' . $row['cust_name'] . '</td>
    <td>' . $row['cust_mail'] . '</td>
    <td>' . $row['cust_mobile'] . '</td>
    <td>' . $row['cust_address'] . '</td>
    <td>' . $row['cust_state'] . '</td>
    <td>' . $row['cust_city'] . '</td>
    <td>' . $row['cust_pin'] . '</td><tr>';
      $html .= '</table>';
    }
  }

  if (isset($_POST['warranty-certificate'])) {  //when the warranty-certificate button is clicked
    require 'warranty-certificate.php';
  }

  if (isset($_POST['renewal-letter'])) {
    require 'renewal-letter.php';
  }
  if (isset($_POST['tax-invoice'])) {
    require 'invoice.php';
  }
  if (isset($_POST['proposal-letter'])) {
    require 'proposal-letter.php';
  }



  ?>
 <!doctype html>
 <html lang="en">

 <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

     <title>Hello, world!</title>
     <style>
     .dropdown-list-cust {
         width: 85%;
     }
     </style>
     <script>


     </script>
 </head>

 <body>
     <div class="container ">
         <h1>Document Generation</h1>
         <p>Click on following options to generate doument.</p>
         <ol>
             <li>Select the Customer from the drop down.</li>
             <li>Click on "Select Customer Button."</li>
             <li>Select the document to Generate.</li>
         </ol>
     </div>


     <br>
     <div class="container ">
         <div class="card">
             <div class="card-body">
                 <form method="POST" class="">

                     <select class="d-inline  form-select dropdown-list-cust" name="selectcustlist"
                         aria-label="Default select example">
                         <option selected>Open this select menu</option>
                         <?php
              if (mysqli_num_rows($res) > 0) {
                do {
                  echo '<option value ="' . $row['cust_id'] . '">' . $row['cust_id'] . ' || ' . $row['cust_name'] . ' || ' . $row['cust_mail'] . ' || ' . $row['cust_mobile'] . ' || ' . $row['cust_state'] . ' || ' . $row['cust_city'] . '</option>';
                } while ($row = mysqli_fetch_assoc($res));
                echo '<select>';
              } else {
                $list .= "Data not found";
              }
              ?>
                         <input class="btn btn-primary" type="submit" value="Select Customer" name="selectcust"
                             onclick="enablebuttons()">

                         <!-- <form method="post" class="d "> -->
                         <!-- <button class=" d-inlinebtn btn-primary" name="selectcust" type="submit">Button</button> -->

                         <!-- <button type="button" class=" d-inline btn btn-success " name="selectcust" onclick="selectcust">select</button> -->
                 </form>
                 <?php echo $html     ?>
                 <?php echo $error     ?>

             </div>
         </div>

         <div class="container document-buttons">
             <div class="card">
                 <div class="card-body mx-auto">
                     <form method="post">
                         <input type="submit" name="warranty-certificate" id="warranty-certificate"
                             value="Warranty Certificate" />
                         <input type="submit" name="renewal-letter" id="renewal-letter" value="Renewal Letter" />
                         <input type="submit" name="tax-invoice" id="tax-invoice" value="Invoice" />
                         <input type="submit" name="proposal-letter" id="proposal-letter" value="Proposal Letter" />
                     </form>
                 </div>
             </div>
         </div>
         <?php ?>

         <!-- 
    <form action="POST">
      <input type="submit" name="insert" value="insert" onclick="insert()" />
      <input class="btn btn-primary" type="button" value="warrantyCertificate" name="warrantyCertificate">

    </form> -->



         <!-- <a class="btn btn-primary" href="" role="button" onclick="warrantyCertificate()">Warranty Certificate</a>
    <a class="btn btn-primary" href="renewal-letter.php" role="button">Renewal Letter</a>
    <a class="btn btn-primary" href="tax-invoice.php" role="button">Tax Invoice</a>
    <a class="btn btn-primary" href="proposal-letter.php" role="button">Proposal Letter</a> -->




         <!-- Optional JavaScript; choose one of the two! -->

         <!-- Option 1: Bootstrap Bundle with Popper -->
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
             integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
             crossorigin="anonymous"></script>

         <!-- Option 2: Separate Popper and Bootstrap JS -->
         <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
 </body>

 </html>