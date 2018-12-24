<?php
class connections extends PDO{
    public $conn;
    function __construct(){
        
		try{
            parent::__construct('mysql:dbname=task;host=localhost', 'root', '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ));
                
                
          }catch (PDOException $e) {
              
              $this->pdoerror['code'] = $e->getCode();
              $this->pdoerror['text'] = $e->getMessage();
          }
  
          
      }
      
    function getError(){
        return $this->pdoerror;
    }

    function select($sql){
        

        $stm = $this->prepare($sql);
        
		try{
			
			$stm->execute();
			
			
		}catch(Exception $e){
			echo $e->getMessage();
			$errorcode=$e->getCode();
        }
        
        if(!isset($errorcode))
		{
			$items = $stm->fetchAll(PDO::FETCH_ASSOC);
			#print_r($items);
		}else
			return $errorcode;
		
		return $items;

    }
    
    function insert($sql){
        

        $stm = $this->prepare($sql);
        
		try{
    		$stm->execute();
		}catch(Exception $e){
			echo $e->getMessage();
			$errorcode=$e->getCode();
        }
        if(!isset($errorcode))
		{
			return $this->lastInsertId();
		}else
			return $errorcode;
		
		

    }
}

?>