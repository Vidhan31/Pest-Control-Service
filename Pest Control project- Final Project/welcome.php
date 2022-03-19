<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

?>
<html>

<head>

    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<div class="container my-3">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Welcome - <?php echo $_SESSION['email'] ?></h4>
        <p>Welcome to the Customer Module</p>
        <p>You are logged in as <?php echo $_SESSION['email'] ?>.</p>
        <table>
            <tr>
                <td>id</td>
                <td><?php echo $_SESSION['id']; ?></td>
            </tr>
            <tr>
                <td>name</td>
                <td><?php echo $_SESSION['name'] ?></td>
            </tr>
            <tr>
                <td>email</td>
                <td><?php echo $_SESSION['email'] ?></td>
            </tr>
            <tr>
                <td>phoneno</td>
                <td><?php echo $_SESSION['phoneno'] ?></td>
            </tr>
            <tr>
                <td>address</td>
                <td><?php echo $_SESSION['address'] ?></td>
            </tr>
            <tr>
                <td>state</td>
                <td><?php echo $_SESSION['state'] ?></td>
            </tr>
            <tr>
                <td>city</td>
                <td><?php echo $_SESSION['city'] ?></td>
            </tr>
            <tr>
                <td>pincode</td>
                <td><?php echo $_SESSION['pincode'] ?></td>
            </tr>
            <tr>
                <td>custtype</td>
                <td><?php echo $_SESSION['custtype'] ?></td>
            </tr>
        </table>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to logout <a href="logout.php"> using this link.</a></p>
    </div>
</div>

</html>
