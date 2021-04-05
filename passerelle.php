
<?php

if(isset($_SESSION['email']) && isset($_SESSION['password'])){
    header('location: http://dynamicwebprogramming/ProjectDynamicWeb/Projet2021DynamicWeb/Buyer.html');
    exit();

}

else{
    header('location: http://dynamicwebprogramming/ProjectDynamicWeb/Projet2021DynamicWeb/Connexion.html');
    exit();

}


?>



