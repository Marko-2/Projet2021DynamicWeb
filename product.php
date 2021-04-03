<?php
include_once('connection.php');
?>

<!DOCTYPE html>

<html>
	
<head>
	<title>Product</title>
	<link rel="stylesheet" href="apperance.css">
</head>

<body>
	<!--banner of the website-->
	<div class="banner"> 
		<a href="Home.php"> YourMarket </a>
		<input type="button" name="account" class="aspectButton" value="Account" onclick="location.href='Connexion.html'">
	</div>

   

	<div class="content">
	<?php

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = "SELECT * FROM product WHERE id='$id'";
			$result = $conn->query($query);	
			while($row = $result->fetch_assoc()){
					$name = $row['name'];
					$description = $row['description'];
					$picture = $row['picture'];
					$price = $row['price'];
					$selltype = $row['selltype'];
					$category = $row['category'];
					$video = "'".$row['video']."'";
			}
			

		}
	

		echo"<div class='imageProduct'>
		<img src='data:image/jpeg;base64,".base64_encode($picture). "' style='height:200px; width:200px'>
		</div>
		<div class='container'>
			<div class='row'>
			  <div class='col-15'>
				<label for='itemId' style='font-weight:bold'>Item id</label>
			  </div>
			  <div class='col-50'>
				<input type='text' id='itemId' name='itemId' class='stealthText' value=$id readonly>
			  </div>
			</div>

			<div class='row'>
				<div class='col-15'>
				  <label for='article' style='font-weight:bold'>Article</label>
				</div>
				<div class='col-50'>
				  <input type='text' id='article' name='article' class='stealthText' value=$name readonly>
				</div>
			</div>

			  <div class='row'>
				<div class='col-15'>
				  <label for='description' style='font-weight:bold'>Description</label>
				</div>
				<div class='col-50'>
				  <input type='textarea' id='description' name='description' class='stealthText' value=$description readonly style='margin-top: 10px;margin-left:5px'>
				</div>
			  </div>  

			  <div class='row'>
				<div class='col-50' style='margin-left:27%'>
				<iframe width='420' height='315'src=$video>
				</iframe> 
				</div> 
			  </div> 
			  
			  <div class='row'>
				<div class='col-15'>
				  <label for='category' style='font-weight:bold'>Category</label>
				</div>
				<div class='col-50'>
				  <input type='text' id='category' name='category' class='stealthText' value=$category readonly>
				</div>
			  </div>

			  <div class='row'>
				<div class='col-15'>
				  <label for='price' style='font-weight:bold'>Price</label>
				</div>
				<div class='col-50'>
				  <input type='text' id='price' name='price' class='stealthText' value=$price readonly>
				</div>
			  </div>

			  <div class='row'>
				<div class='col-15'>
				  <label for='sellType' style='font-weight:bold'>Sell type</label>
				</div>
				<div class='col-50'>
				  <input type='text' id='sellType' name='sellType' class='stealthText' value=$selltype readonly>
				  <input type='button' name='purchase' class='aspectButton' value='Purchase' onclick='location.href='purchase.html''>
				</div>
			  </div>";

	?>	  
	</div>	

	<!-- footer must fit here -->
 	<div class="footer">
 		Copyright all right reserved blahblah...
 	</div>


</body>

</html>