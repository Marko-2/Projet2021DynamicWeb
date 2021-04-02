<?php


function chargeCart(){

	include 'Cart.html';

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "yourmarket";
	$i = 1;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	//selects the correct target(s)
	$sql = "SELECT * FROM product ";
	$result = $conn->query($sql);
/*
	$message='fin du php';
	echo '<script type="text/javascript">window.alert("'.$message.'");</script><br>';
*/
	if ($result->num_rows > 0) {
	  // displays the content
	  while(($row = $result->fetch_assoc()) && ($i<6)) {
	  	
	  	echo '<script type="text/javascript"> 

	  	document.getElementById("description'.$i.'").innerHTML += "'.$row["description"].'";

	  	uniqueCharge( "price'.$i.'" , "'.$row["price"].'" );

	  	chargeProfilePicture( "photo'.$i.'" , "data:image/jpg;base64,'.base64_encode($row["picture"]).'" );
	  	</script><br>';
		/*
	    echo '<script type="text/javascript">window.alert("'.
	     " - Name: " .$row["name"]. " username " .$row["username"]. " - email: ".$row["email"]."password ".$row["password"].'");</script>';
	     */
	     $i = $i + 1;
	  }
	} else {
	  echo '<script type="text/javascript">window.alert("0 results");</script><br>';
	}

}

?>