<!DOCTYPE html>

<html>
	
<head>
	<title>Connexion</title>
	<link rel="stylesheet" href="apperance.css">
</head>

<body>
	<!--banner of the website-->
	<div class="banner"> 
		<a href="Home.php"> YourMarket </a>
		<input type="button" name="account" class="aspectButton" value="Account" onclick="location.href='Connexion.html'">
	</div>
	<!--whole content must fit within the content div-->
	<div class="content">
		<!--profile pic-->
		<div class="connexionPanel">
			<div style="grid-column: 1/3">
				<h3 style="text-align: center;">Connexion</h3> <br>
		
				<div>
					<form action="" method="POST">
						E-mail: 	<input type="text" name="email">
						<br>
						Password:		<input type="text" name="password">
						<br>	
				<input type="submit" name="login" class="regularButton" value="login">
					</form>		
					<?php include 'login.php'; ?>
				</div>

			</div>
				
			
		</div>
	
		<!--account creation-->
		<input type="button" name="createBuyer" class="regularButton" value="Create Buyer Account" onclick="location.href='Buyer.html'">
		<input type="button" name="createSeller" class="regularButton" value="Create Seller Account" onclick="location.href='Seller.html'">

	</div>

 	<!-- footer must fit here -->
 	<div class="footer">
 		Copyright all right reserved blahblah...
 	</div>



</body>
</html>
