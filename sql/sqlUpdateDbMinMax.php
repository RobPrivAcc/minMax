<?php
include('../connection.php');

$newMinMaxArray = $_POST['newMinMaxArray'];
//print_r($newMinMaxArray);

$query = "";
$queryShow = "";



//echo $query;
$db = new PDO($server,$user,$password);
for($i=0; $i <count($newMinMaxArray); $i++){
    $sql = "UPDATE STOCK SET [ReStock Quantity] = '".$newMinMaxArray[$i]['min']."' ,[Replenishment Amount] = '".$newMinMaxArray[$i]['max']."' WHERE [Name of Item] = '".$newMinMaxArray[$i]['name']."';";
    $queryShow .= $sql."<br/>";   
    
    $query = $db->prepare($sql);
    $query->execute();
    
}

echo $queryShow;
?>