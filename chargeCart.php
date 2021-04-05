<?php

chargeCart();

function chargeCart($page = 0){

	session_start();

	include 'Cart.html';

	//changes background
	if(isset($_SESSION['background'])){
		echo '<script type="text/javascript">	
		applyBackground("content","'.$_SESSION['background'].'");
		</script><br>';
	}

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "yourmarket";
	$i = 1;
	//the rank of the row is $i-1
	$range = 5;
	$min = 0;
	$row=0;
	$len = 0;
	//to get the right range
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

	//selects the correct user's cart
	$sql = "SELECT cart FROM buyer WHERE email='".$_SESSION['email']."'AND password='".$_SESSION['password']."'"  ;
	$result = $conn->query($sql);

	

	if ($result->num_rows > 0) {
		// displays the content
		$row = $result->fetch_assoc();
		//decode the ids within a string
		if($row["cart"] == "" ){
			//empty cart
		}else{
			//gets the length to extrac elements
			$len = strlen($row["cart"]);
	  		//echo '<script type="text/javascript">window.alert("'.$len.'");</script><br>';
		}
	} else {
	  echo '<script type="text/javascript">window.alert("0 results");</script><br>';
	}

	//position in the string
	$pos = 0;
	//row of the product
	$rowproduct = 0;

	for ($j=1 ; $j < 6 ; $j++) { 

		//echo '<script type="text/javascript">window.alert("pos'.$pos.'");</script><br>';

		if(isset($row["cart"][$pos])){

			$idProd = $row["cart"][$pos];
		  	//update a field
		  	//sql request
		  	$sql = "SELECT * FROM product WHERE id=".$idProd.";";
		  	$article = $conn->query($sql);

		  	

		  	if($article->num_rows > 0){
		  		//the article
		  		$collumn = $article->fetch_assoc();

		  		//looks for row of article
		  		$sqlrow = "SELECT * FROM product ;";
		  		$articlerow = $conn->query($sqlrow);
		  		if($articlerow->num_rows >0){
		  			$k=0;
		  			//reads the whole product table to find it
		  			while($collumnrow = $articlerow->fetch_assoc()){
		  				//if the id mathches then it is the good row
		  				if($idProd === $collumnrow['id']){
		  					$rowproduct = $k;
		  				}
		  			$k++;
		  			}
		  		}else{
	  				echo '<script type="text/javascript">window.alert("0 results row");</script><br>';

		  		}


		  		echo('<script type="text/javascript">
		  		document.getElementById("description'.($j).'").innerHTML += "'.$collumn["description"].'";
		  		uniqueCharge( "price'.($j).'" , "'.$collumn["price"].'" );
		  		chargeProfilePicture( "photo'.($j).'" , "data:image/jpg;base64,'.base64_encode($collumn["picture"]).'" );
		  		updateCartLinks("view'.$j.'","'.$rowproduct.'");
		  		</script><br>');
		  	}




		}
		//position in the string
	  	$pos = $pos + 2;
	 }



}

?>