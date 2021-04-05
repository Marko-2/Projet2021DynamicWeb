<?php


	$product = $_GET['rank'] ;

	session_start();

	//changes background
	/*
	if(isset($_SESSION['background']) ){
		echo '<script type="text/javascript">	
		applyBackground("content","'.$_SESSION['background'].'");
		</script><br>';
	}*/
	//checks if connected
	if(!isset($_SESSION['email']) || !isset($_SESSION['password'])){
	  echo '<script type="text/javascript">window.alert("lack email or psw");</script><br>';
	}else{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "yourmarket";
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		//we recieved the row we need to check id
		$sqlid = "SELECT * FROM product LIMIT ".$product.",1";
		$resultid = $conn->query($sqlid);
		if ($resultid->num_rows > 0) {
			//finds the row
			$rowid = $resultid->fetch_assoc();
			$productid = $rowid['id'];
		
			//selects the correct target(s)
			$sql = "SELECT cart FROM buyer WHERE email='".$_SESSION['email']."'AND password='".$_SESSION['password']."'"  ;
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// updates the content
				$row = $result->fetch_assoc();
				//decode the ids within a string
				if($row["cart"] == "" ){
					//empty cart
					$sql = "UPDATE buyer SET cart ='".$productid."' WHERE  email='".$_SESSION['email']."'AND password='".$_SESSION['password']."';";
					$conn->query($sql);
					/*
				 	echo '<script type="text/javascript">
				  	alert("UPDATE buyer SET cart = '.$productid.'WHERE  email='.$_SESSION['email'].' AND password= '.$_SESSION['password'].';");
				  	</script><br>';*/

				}else{
					if(strpos($row["cart"] , $productid ) === false){
						//if there is already something else we add it
						$current = $row["cart"];
						$new = $current.",".$productid;
						$sql = "UPDATE buyer SET cart ='".$new."' WHERE  email='".$_SESSION['email']."'AND password='".$_SESSION['password']."';";
						$conn->query($sql);
						/*
						echo '<script type="text/javascript">
						alert("'.$new.''.$_SESSION['email'].''.$_SESSION['password'].'");
						</script><br>';*/
				  		//echo '<script type="text/javascript">window.alert("'.$len.'");</script><br>';
					}else{}
					
				}


			} else {
			  echo '<script type="text/javascript">window.alert("0 results");</script><br>';
			}
		}else{
			  echo '<script type="text/javascript">window.alert("id error");</script><br>';
		}
	}

	header('location: http://localhost/project/chargeCart.php');
	exit();

?>