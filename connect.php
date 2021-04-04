<?php

	include 'chargeBuyer.php';
	include 'chargeSeller.php';

	

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

	//selects the correct target(s)
	$sql = "SELECT * FROM seller WHERE email='".$_POST['email']."' AND password='".$_POST['password']."'  ";
	$result = $conn->query($sql);

	if($result->num_rows <= 0){
		$sql = "SELECT * FROM buyer WHERE email='".$_POST['email']."' AND password='".$_POST['password']."'  ";
		$result = $conn->query($sql);

		if($result->num_rows <= 0){
	  		echo '<script type="text/javascript">window.alert("0 results");</script><br>';
	  		echo'<h1>ERROR: this account is inexistant</h1>';
		}
		else{
			//echo '<script type="text/javascript">window.alert("foundbuyer");</script><br>';
			chargeBuyer($_POST['email'], $_POST['password'] );
		}
	}else{
		//echo '<script type="text/javascript">window.alert("foundseller");</script><br>';
		chargeSeller($_POST['email'], $_POST['password'] );
	}

?>