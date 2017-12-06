<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pet Republic stock manager</title>

   <!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">-->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    

    <link href="css/toogle.css" rel="stylesheet">
    <link href="css/myCSS.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script  type='text/javascript' src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script type='text/javascript' src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>

    <div class="container-fluid" id="mainContainer">
        <div class="row">
            <Div class="form-group">
                <div class="col-xs-10 col-s-10 col-10"><?php include("pages/supplierOptionMenu.php");?></div>
                <div class="col-xs-2 col-s-2 col-2">
                    <button class="btn btn-default">Search</button>
                </div>
            </Div>
        </div>
      
      
    </div>
   
    <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    
    <script type='text/javascript' src="js/bootstrap.min.js"></script>
    
    <!-- Confirm window -->
    <link rel="stylesheet" href="css/jquery-confirm.min.css">
    <script type='text/javascript' src="js/jquery-confirm.min.js"></script>
    

    <!-- toogle button -->
    <link href="css/bootstrap-toggle.css" rel="stylesheet">
    <script type='text/javascript' src="js/bootstrap-toggle.js"></script>
  
  </body>
</html>