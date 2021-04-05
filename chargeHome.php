<?php

chargeHome($_GET['page']);


function chargeHome($page = 0){

	//to use session superglobal
	session_start();

	include 'Home.html';

	//echo '<script type="text/javascript">window.alert("'.$_SESSION['email'].''.$_SESSION['background'].'");</script><br>';

	//changes background
	if(isset($_SESSION['background'])){
		echo '<script type="text/javascript">	
		applyBackground("contentHome","'.$_SESSION['background'].'");
		</script><br>';
	}
	
	//set the number of the page
	echo '<script type="text/javascript">
		document.getElementById("page").value ='.$page.';
		updateButtons('.$page.');
		updateHomeLinks('.$page.');
	</script><br>';

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "yourmarket";

	$i = 1;
	//the rank of the row is $i-1
	$range = 5;
	$min = 0;
	//rank in the page
	if($page >= 0){
		$min = ($page*5);
	  //echo '<script type="text/javascript">window.alert('.$min.''. $max.');</script><br>';
	}else{
	  echo '<script type="text/javascript">window.alert("out of range");</script><br>';
	}

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	//selects the correct targets
	$sql = "SELECT * FROM product LIMIT ".$min.",".$range.";";
	$result = $conn->query($sql);
/*
	$message='fin du php';
	echo '<script type="text/javascript">window.alert("'.$message.'");</script><br>';
*/
	if ($result->num_rows > 0) {
	  // displays the content
	  while(($row = $result->fetch_assoc()) && ($i<6) ) {
	  	
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

	//echo '<script type="text/javascript">	applyBackground('.$_SESSION["background"].');	<script><br>';

}



?>