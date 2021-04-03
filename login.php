<?php
    require 'connection.php';

    if(isset($_POST['login'])){

        extract($_POST);
        if(!empty($password) && !empty($email)){
        $q = $conn->prepare("SELECT * FROM buyers AND sellers WHERE email= :email");
        $q->execute(['email' => $Email]);
        $result = $q->fetch_assoc();
            if($result == true){
                var_dump($result);
            }
            else{
                echo 'Account not found';
            }
        }

    }

?>