<?php



function chargeSeller( $email,  $pass){

	session_start();

	include 'Seller.html';

	//echo '<script type="text/javascript">window.alert("'.$_SESSION['email'].'");</script><br>';

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "yourmarket";
	$back="";
	
	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	//selects the correct target(s)
	$sql = "SELECT * FROM seller WHERE email='" .$email. "' AND password='".$pass."'";
	//echo '<script type="text/javascript">window.alert("'.$sql.' ");</script><br>';
	$result = $conn->query($sql);
/*
	$message='fin du php';
	echo '<script type="text/javascript">window.alert("'.$message.'");</script><br>';
*/
	if ($result->num_rows > 0) {
	  // displays the content
		//this shows that the user is connected
		$_SESSION['email'] = $email;
		//we will verify every time that the right person is connected
		$_SESSION['password'] = $pass;
	  while($row = $result->fetch_assoc()) {
	  	echo '<script type="text/javascript"> uniqueCharge( "name" , "'.$row["name"].'" );</script><br>';
	  	echo '<script type="text/javascript"> uniqueCharge( "Username" , "'.$row["username"].'" );</script><br>';
	  	echo '<script type="text/javascript"> uniqueCharge( "E-mail" , "'.$row["email"].'" );</script><br>';
	  	echo '<script type="text/javascript"> chargeProfilePicture( "photo" , "data:image/jpg;base64,'.base64_encode($row["photo"]).'" );</script><br>';

	  	$back = $row["background"];
		/*
	    echo '<script type="text/javascript">window.alert("'.
	     " - Name: " .$row["name"]. " username " .$row["username"]. " - email: ".$row["email"]."password ".$row["password"].'");</script>';
	     */
	  }
	} else {
	  echo '<script type="text/javascript">window.alert("0 results");</script><br>';
	}

	//finds the according background
	$sql = "SELECT * FROM backgrounds WHERE id='".$back."'";
	$background = $conn->query($sql);
	
	if ($background->num_rows > 0) {
	 	while($row = $background->fetch_assoc()) {
			echo '<script type="text/javascript">
			applyBackground("content","data:image/jpg;base64,'.base64_encode($row["background"]).'");
			</script><br>';
			$_SESSION['background'] = 'data:image/jpg;base64,'.base64_encode($row["background"]).'';
		}
	}else {
		if($back != 0){
			echo '<script type="text/javascript">window.alert("0 results background");</script><br>';
		}
	}
	//echo '<script type="text/javascript">window.alert("'.$_SESSION['email'].'");</script><br>';

}

?>

