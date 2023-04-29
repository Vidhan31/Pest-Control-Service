<?php  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $custid = $_SESSION['id'];
        $q1 = $_POST['rate1'];
        $q2 = $_POST['rate2'];
        $q3 = $_POST['rate3'];
        $q4 = $_POST['rate4'];
        $q5 = $_POST['rate5'];
        $q6 = $_POST['rate6'];
        $q7 = $_POST['rate7'];
        $q8 = $_POST['rate8'];
        $q9 = $_POST['rate9'];
        $q10 = $_POST['rate10'];

        $con = mysqli_connect("localhost","root","","pestokill");
        $update = "INSERT INTO `feedback` (`customer_id`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `suggestions`) VALUES ('', '', '', '', '', '', '', '', '', '', '')";
        $run = mysqli_query($con, $update);
        if($run)
        {
            $flag = true;
            $_SESSION['datetime'] = $datetime;
            $_SESSION['address'] = $address;
            $_SESSION['id'] = $id;
            $_SESSION['city'] = $city;
            $_SESSION['state'] = $state;
            $_SESSION['pin'] = $pin;
        }
    }
?>





<?php
                        if (mysqli_num_rows($run) > 0) {
                            $html = '<table class="table table-info rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">Order ID</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Service Ordered</th>
                                    <th scope="col" colspan="2">Bills/Warrenty Certificates</th>
                                </tr>
                            </thead>
                            <tbody>';
                            

                            while ($row = mysqli_fetch_array($run)) {
                                $html .= '<tr><td>' . $row['order_id'] . '</td><td>' . $row['order_date'] . '</td><td>' . $row['service_name'] . '</td></tr>';
                            }
                            $html .= '</tbody></table>';
                        } else {
                            $html = "Data not found";

                        }
                        echo $html;

                        ?> 




<?php 
                            if($_SESSION['datetime'] == NULL)
                        {
                        echo '<div class="col-6">
                            <label for="Pin" class="form-label">Select date and time for inspeciton</label>
                            <input type="datetime-local" class="form-control" value="<?php echo $_SESSION[\'datetime\']; ?>" 
                            name="datetime" id="datetimeup">
                            </div>';
                        }
                        else
                        {
                        echo '<div class="col-6">
                            <label for="Pin" class="form-label">Selected date and time</label>
                            <input type="text" class="form-control" value="'.$_SESSION['datetime'].'" name="datetime"
                                aria-label="readonly input example" readonly>
                            </div>';
                        }