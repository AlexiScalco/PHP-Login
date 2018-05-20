<?php

//Force User to Be Logged In
    function forceLogin(){
        if(isset($_SESSION['user_id'])){
        //The user is allowed here
        } else {
            //User is no allowed or lacks credentials
            header("Location: /PHP/login.php");
            exit;
        }
    }

//Force user to Dashboard when logged in
    function forceDashboard(){
        if(isset($_SESSION['user_id'])){
            //force to dashboard
            header("Location: /PHP/dashboard.php");
        } else {
            //user is allowed
        }
    }

//Log user out and destroy session
    function logOut(){
        session_start();
        session_destroy();
        session_write_close();
        setcookie(session_name(), '', 0, '/');
        session_regenerate_id(true);

        header("Location:/PHP/index.php");
}

?>