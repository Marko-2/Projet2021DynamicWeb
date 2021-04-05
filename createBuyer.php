<?php
		$conn = new mysqli('localhost', 'root', '', 'yourmarket');
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		if(isset($_POST['create'])){


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
				$background = $_POST['background'];
                
                if(!empty($email) && !empty($name) && !empty($firstname) && !empty($adress1) && !empty($adress2) && !empty($city) && !empty($postalcode) && !empty($country) && !empty($telephone) && !empty($username) && isset($background)){

                    $sql = "SELECT * FROM buyers WHERE email='".$email."'";
                    $result = $conn->query($sql);
                    if($result) echo 'An account with this email already exists <br>';

                    else{
                        $sql = "INSERT INTO buyer (email, lastname, firstname, adressline1, adressline2, city, postalcode, country, telephone, username)
                                VALUES ($email, $name, $firstname, $adress1, $adress2, $city, $postalcode, $country, $telephone, $username)";
                        $conn->query($sql);	
                        
                        echo "Account successfully created";
						sleep(3);
						header('location: http://dynamicwebprogramming/ProjectDynamicWeb/Projet2021DynamicWeb/Home.html');
    					exit();

			        }

                }

		}

?>