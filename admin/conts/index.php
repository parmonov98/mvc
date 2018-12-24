<?php


class indexController extends main{
    function __construct(){
        
        parent::__construct();
        if($this->checkAuth($_COOKIE) == false){
            echo 1;
            header("Location: /admin/?page=login");
        }
    }

    function main(){
        
        $this->views->render('index/main');
        
       
   }
}
