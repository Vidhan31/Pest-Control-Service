<?php
session_start();

if (!isset($_SESSION['loggedinadmin']) || $_SESSION['loggedinadmin'] != true) {
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
        <p>Welcome to the Client Module</p>
        <p>You are logged in as <?php echo $_SESSION['email'] ?>.</p>
        <table>
            <tr>
                <td>email</td>
                <td><?php echo $_SESSION['email'] ?></td>
            </tr>
            <tr>
                <td>role</td>
                <td><?php echo $_SESSION['role'] ?></td>
            </tr>
        </table>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to logout <a href="logout.php"> using this link.</a></p>
    </div>
</div>

</html>
