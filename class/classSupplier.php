<?php
    class supplier{
        
        private $pdo = null;
        private $arraySupplierList = array();
       
        function __construct($serverString){
            if(isset($serverString)){
                $this->pdo = new PDO($serverString);    
            }
                
        }
        
        
        /**
         *
         *
         *  getting supplier array
         *
         **/
        
        function setSupplierList(){
            $arraySuppliers = array();  // empty array to store suppliers
            
            $query = "SELECT [Supplier] FROM [Suppliers] ORDER BY [Supplier] ASC"; // getting all suppliers from DB
            $sql = $this->pdo->prepare($query);
            $sql->execute();
                
            while($row = $sql->fetch()){
              $arraySuppliers[] = $row['Supplier'];
            }
            
            $this->arraySupplierList = $arraySuppliers;
        }
        
        
        function getSupplierList(){
            $this->setSupplierList();
            
            if(isset($arraySupplierList)){
                return $this->arraySupplierList;
            }else{
                return null;
            }
        }
        
    }
?>