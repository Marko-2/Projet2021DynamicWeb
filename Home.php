<?php

include_once('connection.php');
$query ="SELECT * FROM `product` ORDER BY `product`.`id` ASC ";
$result = $conn->query($query);
?>

<!DOCTYPE html>

<html>
	
<head>
	<title>Yourmarket homepage</title>
	<link rel="stylesheet" href="apperance.css">
</head>

<body>
	<!--banner of the website-->
	<div class="banner"> 
		<a href="home.php"> YourMarket </a>
		<input type="button" name="account" class="aspectButton" value="Account" onclick="location.href='Connexion.html'">
	</div>
	<!--whole content must fit within the content div-->
	<div class="contentHome">
		<!--navigation below-->
		<div class="nav">
			<h4 style="text-align: center;"><u>Content</u></h4>
			<input type="checkbox" name="Books" id="Books">
			<label for="Books">Books</label>
			<br>
			<input type="checkbox" name="videoGames" id="videoGames">
			<label for="videoGames">Video Games</label>
			<br>
	 	</div>

	 	<!--this is the list of X articles (we will display mor pages for the other objects)-->
	 	<div class="list">
	 		
		 	<?php
					 while($rows = $result->fetch_assoc()) {
						$id = $rows['id'];
						$picture = $rows['picture'];		
						$price=$rows['price'];
						$description = $rows['description'];
						
						echo "<div class='article'>
							<div class='photo'>
						<img src='data:image/jpeg;base64,".base64_encode($picture). "style='width:100px; height:100px;'>
							</div>
							<div class='description'>
								 $description <br>
								price: <input type='text' name='price' class='stealthText' value=$price readonly>
							</div>
							<div>
								<input type='button' name='add1' class='aspectButton' value='Add to Cart'>
								<a href='product.php?id=$id'> <input type='button' name='view1' class='aspectButton' value='Details'> </a>
							</div>
	 					</div>";
			
					}
			?>
	 	
	 	</div>
	</div>


 	<!-- footer must fit here -->
 	<div class="footer">
 		Copyright all right reserved blahblah...
 	</div>



</body>



</html>
