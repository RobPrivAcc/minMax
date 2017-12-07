<?php

    include('connection.php');
    include('class/classSupplier.php');
    
    $supp = new Supplier($server,$user,$password);
    
    $arraySuppliers = $supp->getSupplierList();
    $option = "";
    
    for($i = 0; $i < count($arraySuppliers);$i++){
        $option .= "<option value = '".$arraySuppliers[$i]["leadTime"]."'>".$arraySuppliers[$i]["supplier"]."</option>";
    }
   
   $select = "<SELECT id='supplierList' class='selectpicker form-control'>".$option."</SELECT>";
   echo $select
?>