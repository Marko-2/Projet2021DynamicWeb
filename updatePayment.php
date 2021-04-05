<?php

session_start();

//echo '<script type="text/javascript">window.alert("00000");</script><br>';

//sets connexion with database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yourmarket";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_SESSION['email']) && isset($_SESSION['password']))
{
	//selects the correct target(s)
	$sql = "SELECT * FROM buyer WHERE email='".$_SESSION['email']."' AND password='".$_SESSION['password']."' ";
	$result = $conn->query($sql);

	if($result->num_rows > 0){

		// displays the content
		$row = $result->fetch_assoc();
/*
		echo '<script type="text/javascript">alert("'.
$_POST['payment'].$row['typeofpayment'].'<br>'.
$_POST['cardnumber'].$row['cardnumber'].'<br>'.
$_POST['name'] .$row['username'].'<br>'.
$_POST['expiration'].$row['expirationdate'].'<br>'.
$_POST['code'].$row['securitycode'].'<br>'.
'");</script><br>';*/

		if(
			isset($_POST['payment']) && ($_POST['payment'] === $row['typeofpayment']) &&
			isset($_POST['cardnumber']) && ($_POST['cardnumber'] === $row['cardnumber']) &&
			isset($_POST['name']) && ($_POST['name'] === $row['username']) &&
			isset($_POST['expiration']) && ($_POST['expiration'] === $row['expirationdate']) &&
			isset($_POST['code']) && ($_POST['code'] === $row['securitycode'])
			){

			echo '<script type="text/javascript">window.alert("correct informations");</script><br>';

			//add command in comand table
			$sqladd = "INSERT INTO 
			commands (id, firstname,	lastname,	telephone,	email,	adressline1,	adressline2,	postalcode,	city,	country,	productname,	description,	price,	category,	seller	) 
			VALUES 
			('".$_SESSION['productid']."','".$_SESSION['FirstName']."','".$_SESSION['LastName']."','".$_SESSION['Phone']."','".$_SESSION['Email']."','".$_SESSION['AdressLine1']."','".$_SESSION['AdressLine2']."','".$_SESSION['Postal']."','".$_SESSION['City']."','".$_SESSION['Country']."','".$_SESSION['productname']."','".$_SESSION['productdesc']."','".$_SESSION['productprice']."','".$_SESSION['productcategory']."','".$_SESSION['productseller']."');";

			//check sql querry
			echo '<script type="text/javascript">window.alert("INSERT INTO 
			commands (id, firstname,	lastname,	telephone,	email,	adressline1,	adressline2,	postalcode,	city,	country,	productname,	description,	price,	category,	seller	) 
			VALUES 
			('.$_SESSION["productid"].$_SESSION["FirstName"].$_SESSION["LastName"].$_SESSION["Phone"].$_SESSION["Email"].$_SESSION["AdressLine1"].$_SESSION["AdressLine2"].$_SESSION["Postal"].$_SESSION["City"].$_SESSION["Country"].$_SESSION["productname"].$_SESSION["productdesc"].$_SESSION["productprice"].$_SESSION["productcategory"].$_SESSION["productseller"].'");</script><br>';

			
			//https://www.w3schools.com/php/php_mysql_insert.asp
			if ($conn->query($sqladd) === TRUE) {
				//remove product from the list

				$sqlremove = "DELETE FROM product WHERE id = ".$_SESSION['productid'].";";
				$conn->query($sqlremove);

				echo '<h1>Purchase Complete</h1> 
						<a href="chargeHome.php?page=0">click here</a> to return to homepage';
			} else {
				echo '<script type="text/javascript">window.alert("0 results add");</script><br>';
			}
		}else
		{
			echo '<script type="text/javascript">window.alert("wrong informations");</script><br>';
		}

	}else{
			echo '<script type="text/javascript">window.alert("0 results");</script><br>';
	}
}else{
	echo'<h1>you are not connected</h1>';
}


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



?>