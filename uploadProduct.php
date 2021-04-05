<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yourmarket";
$maxid = 0;


$photo = $_FILES["uploadfile"]["name"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}


//finds the max id
//selects the correct target
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	// displays the content
  	while($row = $result->fetch_assoc()) {
  		if($row['id'] > $maxid){
  			$maxid = $row['id'];

  		}
  	}
}else{
	echo "<script>alert('error connexion')</script>";
}

$maxid = $maxid +1;
//echo "<script>alert(".$maxid.")</script>";


//makes video text functionnal
$vidtxt = $_POST['videoText'];

$finalvideo = str_replace("watch?v=", "embed/", $vidtxt );

//echo '<script>alert("'.$finalvideo.'");</script>';


$sqlupload = "INSERT INTO product (id, name, picture, description , video, category, price, selltype, seller) VALUES (".$maxid.",'".$_POST['article']."','".$photo."','".$_POST['description']."','".$finalvideo."','".$_POST['category']."','".$_POST['price']."','".$_POST['sellType']."','".$_SESSION['email']."')";


if ($conn->query($sqlupload) === TRUE) {
	echo '<h1>Product added</h1> 
	<a href="chargeHome.php?page=0">click here</a> to return to homepage';
}else {
		echo '<script type="text/javascript">window.alert("0 results add");</script><br>';
	}



?>