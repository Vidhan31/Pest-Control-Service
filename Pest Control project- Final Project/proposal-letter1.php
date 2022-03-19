<?php
require('vendor/autoload.php');
session_start();
include 'partials/_dbconnect.php';


$selectOption = $_SESSION['id'];

$res = mysqli_query($conn, "select * from customer where cust_id = '" . $selectOption . "'");

$row = mysqli_fetch_assoc($res);

if ($selectOption == NULL) {
    $html = ' Please Select Customer to Generate Report.';
} else {
    $html = '';
    $html .= '<style> body{margin:0px;}		.title{margin:0 auto; padding:10px;background-color:#80c342;color:white;} table{ margin-left: auto;
  margin-right: auto;width: 80%;padding: 10px 0;}		.center{ text-align:center;}		.invoice{text-decoration: underline;} td,th{border: 1px solid black;}	</style>';
    $html .= '<div class="title">		<h1 class="title center"><img src="https://bit.ly/35wyGF0" width="25px"> Pestokill India Pvt Ltd.</h1>		<p class="title center">A-88, 1st floor, Madhu Vihar Patparganj Delhi-92</p>	</div>
    	<h3 class="center invoice">Proposal Letter</h3>';

    $html .= '<b>To</b>,<br>' . '&emsp;&emsp;' . $row['cust_name'] . '<br>' . '&emsp;&emsp;' . $row['cust_address'] . '<br>' . '&emsp;&emsp;' . $row['cust_city'] . '<br>' . '&emsp;&emsp;' . $row['cust_state'] . '<br>' . '&emsp;&emsp;' . $row['cust_pin']. '<br><br><br>';
    $html .= '<b>Date:-</b>' . date("d/m/y") . '<br><br><br>';
    $html .= '<b>Subject:-</b>' . ' Proposal Letter for <i>' . $row['cust_type'] . '</i> Serivce.<br><br><br>';
    $html .= 'Dear Sir, <br><br>
Thank you for choosing to do business with us. We are grateful for the opportunity to serve you.
We have completed Pest Control Service at the above-mentioned location. An Proposal Letter for the service is attached. <br><br>';



    $html .= '<table cellspacing="0"><tr><th>Name.</th>	<th>Email</th> <th>Address</th>	<th>Service</th></tr>';
    $html .= '<tr>	<td>' . $row['cust_name'] . '</td>	<td>' . $row['cust_mail'] . '</td>	<td>' . $row['cust_address'] . '</td>	<td>' . $row['cust_type'] . '</td></tr></table><br><br><br><br>';
    $html .= 'Should you require further information on the above, please call our customer care number or WhatsApp on +91 9910224202 us, and we would gladly assist you.  <br>  <br>
 Yours sincerely, <br>
For Pestokill Services India PVT. LTD.<br>
Lokesh Rana<br>
Business development manager<br>
lokesh.rana12@gmail.com <br>
 (+91 9910224202) <br><br><br> ';
}

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file = 'Proposal Letter/' . $row['cust_id'] . '/' . $row['cust_name'] . '/' . time() . '.pdf';
$mpdf->output($file, 'I');
session_unset();
session_destroy();
//D
//I
//F
//S
