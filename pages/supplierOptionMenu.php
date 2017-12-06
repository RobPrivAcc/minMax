<?php

    include('connection.php');
    include('class/classSupplier.php');
    
    $string = '"'.$server.'","'.$user.'","'.$password.'"';
   
    $supp = new Supplier($server,$user,$password);
    
    $arraySuppliers = $supp->getSupplierList();
    $option = "";
    
    for($i = 0; $i < count($arraySuppliers);$i++){
        $option .= "<option>".$arraySuppliers[$i]."</option>";
    }
   
   $select = "<SELECT id='suppliers' class='selectpicker form-control'>".$option."</SELECT>";
   echo $select
?>