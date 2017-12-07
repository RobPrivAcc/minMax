<?php
set_time_limit (120);
include('../class/classProduct.php');
include('../connection.php');
    $supplier = $_POST['supplier'];
    $leadTime = $_POST['leadTime'];
   // $supplier = "Feedwell";
    echo $supplier.'   lead time: '.$leadTime;
    
    $product = new Product($server,$user,$password);
    
    $productList =$product->getProductsBySupplier($supplier);
   
    $div = "<DIV class = 'row'>";
        $div .= "<DIV class = 'col-xs-12 col-s-12 col-12'>";
            $div .= "Calculation taken up to: xx";
        $div .= "</DIV>";
	$div .= "</DIV>";
    
	$div .= "<DIV class = 'row'>";
   $updateData = array();
   
    for($i=0; $i<count($productList); $i++){
        $weekAvg = $product->getMonth($productList[$i]['name'],2);
        $newMin = $product->getMin($weekAvg,$leadTime,20);
        $newMax = $product->getMax($weekAvg,$leadTime,$productList[$i]['pack'],40);
        $div .= "<DIV class = 'col-xs-12 col-s-12 col-12' style = 'border-bottom: 1px solid black;'>";
            $div .= "<DIV class = 'row'>";
                $div .= "<DIV class = 'col-xs-12 col-s-12 col-12'><strong>";
                    $div .= $productList[$i]['name']."  Pack Size: (".round($productList[$i]['pack'],2).")    Weakly avarage(".$weekAvg.")";
                $div .= "</strong></DIV>";
            $div .= "</DIV>";
            
            $div .= "<DIV class = 'row'>";
                $div .= "<DIV class = 'col-xs-4 col-s-4 col-4'>";
                    $div .= "Current QTY: ".round($productList[$i]['qty'],2);
                $div .= "</DIV>";
                $div .= "<DIV class = 'col-xs-4 col-s-4 col-4'>";
                   
                    $div .= "MIN: ".round($productList[$i]['min'],2)." -> (".$newMin.")";
                $div .= "</DIV>";
                $div .= "<DIV class = 'col-xs-4 col-s-4 col-4'>";
                 
                    $div .= "MAX: ".round($productList[$i]['max'],2)." -> (".$newMax.")";
                $div .= "</DIV>"; 
            $div .= "</DIV>";
        $div .= "</DIV>";
        
        $updateData[] = array('name' => $productList[$i]['name'],'min' => $newMin, 'max' => $newMax);
    }
    $div .= "<input type 'hidden' id = 'newMinMaxArray' value = '".json_encode($updateData)."'/>";
   /*echo $productList[0]['name']."  Pack Size: (".$productList[0]['pack'].") <br/>'";
   print_r($productList);*/
    echo $div;
?>