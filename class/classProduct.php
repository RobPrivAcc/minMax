<?php
    class Product{
        
        private $pdo = null;
        private $arrayProductsList = array();
        private $date = null;
       
        function __construct($server,$user,$pass){
            if(isset($server) || isset($user) || isset($pass)){
                $this->pdo = new PDO($server,$user,$pass);
            }
                
            $this->date = date("Y-m-d",mktime(0, 0, 0, date("m")-2, date("d"), date("Y")));
        }
        
        function getDate(){
            return $this->date;
        }
        
        private function setProductsList($name){
            $arrayProducts = array();  // empty array to store Products
            
            $query = "SELECT [Name of Item], [ReStock Quantity] as 'min',
                     [Replenishment Amount] as 'max', [Quantity],[PackSize],
                        (SELECT ISNULL(sum(Orders.[QuantityBought]),0) 
                            from Orders 
                            inner join [Days] on [Orders].[OrderNo] = [Days].[Order Number] 
                             WHERE [Date] > '".$this->getDate()."' AND [NameOfItem] = '$name')  as 'Total'
                        FROM Stock 
                    WHERE [Name of Item] = '$name';";
            //echo $query.'<br/>';    
           
            $sql = $this->pdo->prepare($query);
            $sql->execute();
                
            while($row = $sql->fetch()){
              $this->arrayProductsList[] = array('name'=> $row['Name of Item'],
                                                 'min' => $row['min'],
                                                 'max' => $row['max'],
                                                 'qty' => $row['Quantity'],
                                                 'pack' => $row['PackSize'],
                                                 'sold' => $row['Total']);
            }
        }
      
        function getProductsBySupplier($supplier){
            
            $query = "SELECT [Name of Item]
            from [Stock]
            WHERE [SupplierName] = '$supplier' AND Discontinued = '0';";
                
            $sql = $this->pdo->prepare($query);
            $sql->execute();
                
                $arrayNameOfProduct = array();
                
            while($row = $sql->fetch()){
                $this->setProductsList($row['Name of Item']);
            }
            return $this->arrayProductsList;
        }
        
        
        public function getMonth($productName,$months){
            $dateMonth = date('Y-m-d', strtotime('-'.$months.' month'));
            
            
            $sql = "select sum([QuantityBought]) AS Total
            from [Orders]
            inner join [Days] on [Orders].[OrderNo] = [Days].[Order Number]
            WHERE [Date] > '".$dateMonth."' AND [NameOfItem] = '".$productName."'";
            
            $query = $this->pdo->prepare($sql);
            $query->execute();
            $multipliterWeeks = $months*4;
            
            $weekAvg = 0;
            
            for($i=0; $row = $query->fetch(); $i++){
                $weekAvg = round($row['Total']/$multipliterWeeks,2);
            }
            
            return $weekAvg;
        }
        
        public function getMin($weekAvg,$leadTime,$minProc){
            
            $min = round(($weekAvg*$leadTime - ($minProc*$weekAvg)/100),0);
           // $min = round($this->Sum,0);

            if($min == 0 OR $min == 1){
                $min = 2;
            }
            
            return $min;
        }
        
        public function getMax($weekAvg,$leadTime,$packSize,$maxProc){
           
            $max = round(($weekAvg*$leadTime + ($maxProc*$weekAvg)/100),0);

            if($max == 0 OR $max == 1){
                $max = 2;
            }
            
            
            
            while ($max%$packSize != 0){
                $max++;
            }
            
            return $max;
        }
    }
?>