<?php
class boardController extends main{
    function __construct(){
        
        parent::__construct();
        if($this->checkAuth($_COOKIE) == false){
            echo 1;
            header("Location: /admin/?page=login");
        }
        
    }

    function main(){
        $this->views->render('board/main');
    }

    
    function create(){
        
        $sentences = explode('.', $_POST['sentences']);
        $details = array();
        for($i = 0; $i < count($sentences); $i++){
            #echo $sentences[$i].'<br>';
            $words = explode(' ', $sentences[$i]);
            $details[$i]['numbers'] = count($words);
            for($j = 0; $j < count($words); $j++){
                if(empty($words[$j]))
                    unset($words[$j]);
                
            }
            if(count($words) < 3){
                unset($sentences[$i]);
            }
           
            
           
        }

        #print_r($details);
        
        
       
        $this->createTasks($sentences, $details);
        $this->views->render('board/create');
    }
}

?>