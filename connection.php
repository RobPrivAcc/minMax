<?php
/*
    1 - Petzone
    2 - Donaghmede
    3 - Swords
    4 - Petco
    5 - Charlestown
    10 - Local XPS

*/


$shopNo = 30;
switch ($shopNo){
    case 1:     //Petzone
        $shopName = "Coolock";
        $server = "sqlsrv:Server=SANGOTILL2\SQLEXPRESS;Database=petshoptest";
        $user = "sa";
        $password = "SMITH09ALPHA";
        break;
    
    case 2:     //donaghmede
        $shopName = "Donaghmede";
        $server = "sqlsrv:Server=PREMEPOS-SANGO1\SQLEXPRESS;Database=petshoptest";
        $user = "sa";
        $password = "SMITH09ALPHA";
        break;
    
    case 3:     //Swords
        $shopName = "Swords";
        $server = "sqlsrv:Server=SANGOTILL3\SQLEXPRESS;Database=Petshoptest";
        $user = "sa";
        $password = "SMITH09ALPHA";
        break;
    
    case 4:     //PetCo
        $shopName = "Petco";
        $server = "sqlsrv:Server=86.47.51.83,1317;Database=petshoptest";
        $user = "sa";
        $password = "SMITH09ALPHA";
        break;
    
    case 5:     //Charlestown
        $shopName = "Charlestown2";
        $server = "sqlsrv:Server=PREMEPOS-SANGO2\SQLEXPRESS;Database=PremierEPOS";
        $user = "sa";
        $password = "SMITH09ALPHA";
        break;
    
    case 10:        //Local xps
        $shopName = "local_XPS";
        $server = "sqlsrv:server=XPS\SQLEXPRESS;Database=petshoptest";
        $user = "stocktake";
        $password = "stocktake";
        break;
		
	case 20:        //Local PC
        $shopName = "Charlestown";
        $server = "sqlsrv:server=VENOM\VENOMMSSQL;Database=petshoptest";
        $user = "stocktake";
        $password = "stocktake";
        break;

    case 30:        //XPS
        $shopName = "Swords";
        $server = "sqlsrv:server=DESKTOP-TACKN94\SQLEXPRESS2016;Database=petshoptest";
        $user = "stocktake";
        $password = "stocktake";
        break;

}

?>