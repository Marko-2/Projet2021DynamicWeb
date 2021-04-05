<?php

$conn = new mysqli('localhost', 'root', '', 'yourmarket');
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		if(isset($_POST['modify'])){

				$email = $_POST['email'];
				$name = $_POST['name'];
				$firstname = $_POST['firstname'];
				$adress1 = $_POST['adress1'];
				$adress2 = $_POST['adress2'];
				$city = $_POST['city'];
				$postalcode = $_POST['postalcode'];
				$country = $_POST['country'];
				$telephone = $_POST['telephone'];
				$username = $_POST['username'];
				$passwrd = $_POST['passwrd'];
				$background = $_POST['back'];


                if(!empty($email) && !empty($name) && !empty($firstname) && !empty($adress1) && !empty($adress2) && !empty($city) && !empty($postalcode) && !empty($country) && !empty($telephone) && !empty($username) && !empty($passwrd) && isset($background)){


                        $sql = "UPDATE Customers
                        SET lastname = '".$name."',"."firstname='".$firstname."', adressline1='".$adress1."', adressline2='".$adress2."', city='".$city."', postalcode=".$postalcode.", country='".$country."',telephone=".$telephone.", password='".$passwrd."', username='".$username."'  
                         WHERE email ='".$email."';";
                        $conn->query($sql);	
                        
                        echo "<b>Account successfully modified </b>";
						sleep(2);
						header('location: http://dynamicwebprogramming/ProjectDynamicWeb/Projet2021DynamicWeb/Home.html');
    					exit();

			        }

                }

		}

?>



?>