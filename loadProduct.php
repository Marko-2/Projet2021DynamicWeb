<?php

session_start();

include 'product.html';

//changes background
	if(isset($_SESSION['background'])){
		echo '<script type="text/javascript">	
		applyBackground("content","'.$_SESSION['background'].'");
		document.getElementsByClassName("container")[0].style.background = "transparent";
		</script><br>';
	}

	//set everything to editable
	echo "<script>setEditableProduct();</script>";




?>