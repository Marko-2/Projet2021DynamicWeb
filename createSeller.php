<?php
		$conn = new mysqli('localhost', 'root', '', 'yourmarket');
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		if(isset($_POST['create'])){

				$email = $_POST['email'];
				$name = $_POST['name'];
				$username = $_POST['username'];
                $passwrd = $_POST['passwrd'];
				$background = $_POST['back'];
                
                if(!empty($email) && !empty($name)  && !empty($username) && !empty($passwrd) && isset($background)){

                    $sql = "SELECT * FROM seller WHERE email='".$email."'";
                    $result = $conn->query($sql);
                    if(!$result){
						echo 'An account with this email already exists <br>';
						header('location: http://dynamicwebprogramming/ProjectDynamicWeb/Projet2021DynamicWeb/createSeller.html');
					}
                    else{
                        $sql = "INSERT INTO seller (email, lastname, username, pass"."word)
                                VALUES ('".$email."','".$name."','".$username.",'".$passwrd."')";
                        $conn->query($sql);	
                        
                        echo "Account successfully created";
						sleep(2);
						header('location: http://dynamicwebprogramming/ProjectDynamicWeb/Projet2021DynamicWeb/Home.html');
    					exit();

			        }

                }

		}

?>