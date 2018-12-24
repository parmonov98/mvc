<?php

class loginController extends main{
    function __construct(){

        
        parent::__construct();
        if($this->checkAuth($_COOKIE) != false){
            header("Location: /admin/?page=profile");
        }else{
            
        }
        
    }

    function main(){
        
        $this->views->render('login/main');
    }

    
    function login(){
        
        if($this->signIn($_POST) == true){
            
            header("Location: /admin/?page=profile");
        }else{
            header("Location: /admin/?page=login");
        }
        
    }
}

?>