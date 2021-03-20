<!DOCTYPE html>

<html>

<head>

<title>Verification</title>
<link rel="stylesheet" href="apperance.css">

</head>


<body>
<div class="banner">
    MyMarket
    <div class="tabcontent">
    </div>
      
    <a href="Home.html"> <button class="tablink">My Account</button> </a>
    


    <div>
        <form action="" method="post">
            
        Name: <input type="text" name="name" value="<?php echo $name;?>">
        Surname: <input type="text" name="surname" value="<?php echo $surname;?>">

        E-mail: <input type="text" name="email" value="<?php echo $email;?>">
        Phone: <input type="text" name="phone" value="<?php echo $phone;?>">

        Adress : <input type="text" name="adress" value="<?php echo $adress;?>">
        Postal code : <input type="text" name="postal" value="<?php echo $postal;?>">
        Country : <input type="text" name="country" value="<?php echo $country;?>">
        
        </form>


    </div>

</div>


</body>





</html>