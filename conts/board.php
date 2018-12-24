<?php
class boardController extends main{
    function __construct(){
        
        parent::__construct();
        if($this->checkAuth($_COOKIE) == false){
            
            header("Location: /?page=login");
        }
        
    }

    function main($id = '' ){

        if(empty($id)){
            $this->views->render('board/all', $this->selectAll(), array());
        }
        else{
            $senten = $this->getSentenceById($id);
            
            if(count($senten) > 0){
                
                $words = explode(" ", $senten[0]['content']);
                $max = count($words);

                $options =array();
                $index = random_int(0, 3);
            
                for($i = 0; $i < 4; $i++){
                    $int = random_int(0, count($words)-1);
                    if(!in_array($words[$int], $options)){
                        if($index == $i){
                            $options[$i] = $senten[0]['quiz'];
                            continue;
                        }
                        $options[$i] = $words[$int];
                    }else{
                        $int = random_int(0, count($words)-1);
                        if(!in_array($words[$int], $options)){
                            if($index == $i){
                                $options[$i] = $senten[0]['quiz'];
                                continue;
                            }
                            $options[$i] = $words[$int];
                        }else{
                            $options[$i] = $words[random_int(0, count($words) - 1)];
                        }
                        

                    }
                }
            
            $words['quiz'] = $senten[0]['quiz'];
            $senid = $senten[0]['id'];
            $this->views->render('board/main', $words, $options, $senid);
        }else{
            $words =array();
            $options =array();
            $senid = 0;
            $this->views->render('board/main', $words, $options, $senid);
        }
        }
            
    }


}

?>