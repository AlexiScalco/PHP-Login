<?php 

    //Allow the config
    define('__CONFIG__', true);
    //Require the config
    require_once ('/../inc/config.php');


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //return JSON format
        header('Content-Type: application/json');
        
        $return = [];
        
        $email= Filter::String( $_POST['email'] );
        
        //Make sure user doesn't already exit
        $findUser = $con->prepare("SELECT user_id FROM users WHERE email = LOWER(:email) LIMIT 1");
        $findUser->bindParam(':email', $email, PDO::PARAM_STR); 
        $findUser->execute();
        
        if($findUser->rowCount() == 1){
            //If User exists
            $return['error'] = "You already have an account...";
            $return['is_logged_in'] = false;
            
        } else {
            //Add user
            
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            $addUser = $con->prepare("INSERT into users(email, password) VALUES(LOWER(:email), :password)");
            $addUser->bindParam(':email', $email, PDO::PARAM_STR);
            $addUser->bindParam(':password', $password, PDO::PARAM_STR);
            $addUser->execute();
            
            $user_id = $con->lastInsertId();
            
            $_SESSION['user_id'] = (int) $user_id;
            
            $return['redirect'] = '/dashboard.php?message=welcome';
            $return['is_logged_in'] = true;
        }
        
        //Make sure the user can be, and is, added
        
        //Return the proper information back to JS for appropriate redirect
        
        /*$return['name'] = "Alexi Scalco";*/
        
        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;
    
    } else {
        //Die
        exit("Something went wrong...");
    }

    


?>