<?php


class profileController extends main{
    function __construct(){
        parent::__construct();
        
        if($this->checkAuth($_COOKIE) == false){
            header("Location: /admin/?page=login");
            
        }
    }

    function main(){
        
        $this->views->render('profile/main');
        
       
   }
}
