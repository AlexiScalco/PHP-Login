<?php 

    //Allow the config
    define('__CONFIG__', true);
    //Require the config
    require_once ('inc/config.php');

 forceLogin();

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>PHP Login</title>
    
    
    <!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.2/css/uikit.min.css" />
</head>
<body>
    
    <div class="uk-section uk-container">
DASHBOARD<br>
You are logged in as <?php echo $_SESSION['user_id'] ?>.
  	</div>    
    
<?php require_once("inc/footer.php"); ?>