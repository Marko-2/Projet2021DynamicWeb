
<?php

session_start();

if(isset($_SESSION['email']) && isset($_SESSION['password'])){
    
	
    
    include 'connect.php';

}

else{
	
    header('location: http://localhost/test/Connexion.html');
    exit();

}


?>



