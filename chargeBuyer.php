<?php



function chargeBuyer($email,  $pass){


	include 'Buyer.html';

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
	$sql = "SELECT * FROM buyer WHERE email='" .$email. "' AND password='".$pass."'";
	$result = $conn->query($sql);
/*
	$message='fin du php';
	echo '<script type="text/javascript">window.alert("'.$message.'");</script><br>';
*/
	if ($result->num_rows > 0) {
	  // displays the content
	  while($row = $result->fetch_assoc()) {
	  	echo '<script type="text/javascript"> 

	  	uniqueCharge( "name" , "'.$row["lastname"].'" );
	  	uniqueCharge( "firstName" , "'.$row["firstname"].'" );
	  	uniqueCharge( "username" , "'.$row["username"].'" );
	  	uniqueCharge( "email" , "'.$row["email"].'" );
	  	uniqueCharge( "adress1" , "'.$row["adressline1"].'" );
	  	uniqueCharge( "adress2" , "'.$row["adressline2"].'" );
	  	uniqueCharge( "city" , "'.$row["city"].'" );
	  	uniqueCharge( "postalcode" , "'.$row["postalcode"].'" );
	  	uniqueCharge( "country" , "'.$row["country"].'" );
	  	uniqueCharge( "telephone" , "'.$row["telephone"].'" );

	  	chargeProfilePicture( "photo" , "data:image/jpg;base64,'.base64_encode($row["profilepicture"]).'" );
	  	</script><br>';
		/*
	    echo '<script type="text/javascript">window.alert("'.
	     " - Name: " .$row["name"]. " username " .$row["username"]. " - email: ".$row["email"]."password ".$row["password"].'");</script>';
	     */
	  }
	} else {
	  echo '<script type="text/javascript">window.alert("0 results");</script><br>';
	}

}


?>