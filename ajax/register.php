<?php 

    //Allow the config
    define('__CONFIG__', true);
    //Require the config
    require_once ('/../inc/config.php');


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //return JSON format
        header('Content-Type: application/json');
        
        $return = [];
        
        //Make sure user doesn't already exit
        
        //Make sure the user can be, and is, added
        
        //Return the proper information back to JS for appropriate redirect
        
        $return['redirect'] = '/dashboard.php';
        $return['name'] = "Alexi Scalco";
        
        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;
    
    } else {
        //Die
        exit("Something went wrong...");
    }

    


?>