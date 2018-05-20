<?php 
    //If there isn't a defined constant __CONFIG__, do not load this file
    if(!defined('__CONFIG__')) {
        exit("You don't have a config file...");
    }

    //CONFIG below

    //Allow Errors
    error_reporting(-1);
    ini_set('display_errors', 'On');


    include_once ("classes/db.php");
    include_once ("classes/filter.php");
    
    $con = DB::getConnection();
?>