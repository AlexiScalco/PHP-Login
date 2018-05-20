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
        $password = $_POST['password'];
        
        
        //Make sure user doesn't already exit
        $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
        $findUser->bindParam(':email', $email, PDO::PARAM_STR); 
        $findUser->execute();
        
        if($findUser->rowCount() == 1){
            //If User exists
            $User = $findUser->fetch(PDO::FETCH_ASSOC);
            
            $user_id = (int) $User['user_id'];
            $hash = (string) $User['password'];
            
            if(password_verify($password, $hash)){
                //User is signed in
                $return['redirect'] = '/PHP/dashboard.php';
                
                $_SESSION['user_id'] = $user_id;
            } else {
                //Invalid user-pass combo
                $return['error'] = 'Invalid Login Credential(s)';
            }
            
        } else {
            //Add user
            $return['error'] = "You do not have an account. <a href='/PHP/register.php'>Register Now?</a>";
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