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
    <title>Pet Republic Min Max generator71874196</title>

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
            
                <div class="col-xs-10 col-s-10 col-10">
                  <?php include("pages/supplierOptionMenu.php");?>
                  

                </div>
                <div class="col-xs-2 col-s-2 col-2">
                    <button class="btn btn-default" id="showProductsFromSuppliers">Search</button>
                </div>
            
        </div>
        <div class="row">
          
            <div class="form-group col-lg-4">
                <label for="code">Lead time</label>
                <input type="text" id="leadTime" class="form-control" />
            </div>
            
            <div class="form-group col-lg-4">
                <label for="code">min offset</label>
                <input type="text" id="minOff" value="20" class="form-control" />
            </div>
          
          <div class="form-group col-lg-4">
                <label for="code">Max offset</label>
                <input type="text" id="maxOff" value="40" class="form-control" />
            </div>
        </div>
              <!--                 Lead time <input type="text" id="leadTime"/>
                  min offset <input type="text" id="minOff" value="20"/>
                  Max offset <input type="text" id="maxOff" value="40"/>-->
        <div class="row">
            <div class="col-xs-12 col-s-12 col-12">
                <div id = "result"></div>
            </div>
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
    
    <script type = "application/javascript">
       $( "#supplierList" )
        .change(function () {
          var supplierList = $("#supplierList option:selected").val();
          $("#leadTime").val(supplierList);
        });
      
      
        $( "#showProductsFromSuppliers" )
          .click(function () {
            var spinner = "<div class='loading'><div class='spinner'><i class='fa fa-spinner fa-spin fa-5x fa-fw'></i>Loading...</div></div>";
                    $('#result').html(spinner);
            var supplierList = $("#supplierList option:selected").text();
            
           
            var minOff = $("#minOff").val();
            var maxOff = $("#maxOff").val();
            var leadTime = $("#leadTime").val();
            $.post( "sql/sqlProductsList.php", { supplier: supplierList, leadTime: leadTime, minOff: minOff, maxOff:maxOff})
                .done(function( data ) {
                    $('#result').html(data);
                   
                });
          });
    </script>
    
    <script type = "application/javascript">      
        function minMaxUpdateValues(newMinMaxArray) {
                $.post( "sql/sqlUpdateDbMinMax.php", { newMinMaxArray: newMinMaxArray})
                .done(function( data ) {
                  $('#result').html(data);
                  });
          };
          
    </script>
  
  </body>
</html>