<?php


//had to block cookies in oreder to remove errors
chargeProduct($_GET['id']);

function chargeProduct($id){

session_start();

	include 'product.html';

//echo '<script type="text/javascript">window.alert("'.$_SESSION['email'].''.$_SESSION['background'].'");</script><br>';

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "yourmarket";

	//changes background
	if(isset($_SESSION['background'])){
		echo '<script type="text/javascript">	
		applyBackground("content","'.$_SESSION['background'].'");
		document.getElementsByClassName("container")[0].style.background = "transparent";
		</script><br>';
	}

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	//selects the correct target(s)
	$sql = "SELECT * FROM product WHERE id='" .$id. "'";
	$result = $conn->query($sql);
/*
	$message='fin du php';
	echo '<script type="text/javascript">window.alert("'.$message.'");</script><br>';
*/
	if ($result->num_rows > 0) {
	  // displays the content
	  while($row = $result->fetch_assoc()) {
	  	echo '<script type="text/javascript"> 

	  	uniqueCharge( "itemId" , "'.$row["id"].'" );
	  	uniqueCharge( "article" , "'.$row["name"].'" );
	  	uniqueCharge( "description" , "'.$row["description"].'" );

	  	

	  	uniqueCharge( "category" , "'.$row["category"].'" );
	  	uniqueCharge( "price" , "'.$row["price"].'" );
	  	uniqueCharge( "sellType" , "'.$row["selltype"].'" );

	  	chargeProfilePicture( "productImage" , "data:image/jpg;base64,'.base64_encode($row["picture"]).'" );

	  	chargeVideo( "video" , "'.$row["video"].'" );
	  	
	  	</script><br>';
	  }
	} else {
	  echo '<script type="text/javascript">window.alert("0 results");</script><br>';
	}

	echo '<script type="text/javascript">
		updatePurchaseRedirect();
	</script><br>';

	

	// closing connection
	mysqli_close($conn);

}


?>