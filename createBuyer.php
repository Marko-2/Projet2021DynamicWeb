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
			$passwrd = $_POST['passwrd'];
			$background = $_POST['background'];
                
            if(!empty($email) && !empty($name) && !empty($firstname) && !empty($adress1) && !empty($adress2) && !empty($city) && !empty($postalcode) && !empty($country) && !empty($telephone) && !empty($username) && !empty($passwrd) && isset($background)){

                $sql = "SELECT * FROM buyer WHERE email='".$email."';";
                $result = $conn->query($sql);

                if($result->num_rows > 0 ){
					echo 'An account with this email already exists <br>';
					$row = $result->fetch_assoc();
					sleep(2);;
					//header('location: http://localhost/test/createBuyer.html');
				}
                else{
                    $sql = "INSERT INTO buyer (email, lastname, firstname, adressline1, adressline2, city, postalcode, country, telephone, username, password)
                                VALUES ('".$email."','".$name."','" .$firstname."','".$adress1."','".$adress2."','".$city."',".$postalcode.",'".$country."',".$telephone.",'".$username."','".$passwrd."');";
                    $conn->query($sql);	
                        
                    echo "<b>Account successfully created </b>";
					sleep(2);
					//header('location: http://localhost/test/chargeHome.php?page=0');
    				//exit();

			    }

            }

		}

?>