<?php

session_start();

$_SESSION['FirstName'] = $_POST['firstname'];
$_SESSION['LastName'] = $_POST['lastname'];
$_SESSION['Phone'] = $_POST['phone'];
$_SESSION['Email'] = $_POST['email'];
$_SESSION['AdressLine1'] = $_POST['adressline1'];
$_SESSION['AdressLine2'] = $_POST['adressline2'];
$_SESSION['Postal'] = $_POST['postal'];
$_SESSION['City'] = $_POST['city'];
$_SESSION['Country'] = $_POST['country'];

//to check
/*
echo '<script type="text/javascript">alert("'.
$_SESSION['FirstName'].
$_SESSION['LastName'].
$_SESSION['Phone'] .
$_SESSION['Email'].
$_SESSION['AdressLine1'].
$_SESSION['AdressLine2'].
$_SESSION['Postal'].
$_SESSION['City'].
$_SESSION['Country'].'");</script><br>';*/

header('location: http://localhost/project/Payment.html');
exit();

?>