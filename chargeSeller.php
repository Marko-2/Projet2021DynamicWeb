<?php

	include 'Seller.html';

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
	$sql = "SELECT * FROM seller WHERE email='firstseller@gmail.com' AND password='firstsellerpassword'";
	$result = $conn->query($sql);

	$message='fin du php';
	echo '<script type="text/javascript">window.alert("'.$message.'");</script>';

	if ($result->num_rows > 0) {
	  // displays the content
	  while($row = $result->fetch_assoc()) {
	  	echo '<script type="text/javascript"> uniqueCharge( "name" , "'.$row["name"].'" );</script>';
	  	echo '<script type="text/javascript"> uniqueCharge( "Username" , "'.$row["username"].'" );</script>';
	  	echo '<script type="text/javascript"> uniqueCharge( "E-mail" , "'.$row["email"].'" );</script>';

		/*
	    echo '<script type="text/javascript">window.alert("'.
	     " - Name: " .$row["name"]. " username " .$row["username"]. " - email: ".$row["email"]."password ".$row["password"].'");</script>';
	     */
	  }
	} else {
	  echo '<script type="text/javascript">window.alert("0 results");</script>';
	}
	

	

?>

