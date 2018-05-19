<?php 

    //Allow the config
    define('__CONFIG__', true);
    //Require the config
    require_once ('inc/config.php');

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

    <?php 
        echo "<em>Hello There!</em> <br>";
    ?>
    <span style="font-weight:bold; font-size:14px; border-top:2px solid #EAEAEB;">Today is <?php echo date("D M d Y"); ?></span><br>
    
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
    
    
  	</div>    
    
    
    
    
<?php require_once("inc/footer.php"); ?>