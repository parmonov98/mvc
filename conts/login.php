<?php

class loginController extends main{
    function __construct(){

        
        parent::__construct();
        if($this->checkAuth($_COOKIE) != false){
            header("Location: /?page=profile");
        }else{
            
        }
        
    }

    function main(){
        
        $this->views->render('login/main', array(), array());
    }

    
    function login(){
        
        if($this->signIn($_POST) == true){
            
            header("Location: /?page=profile");
        }else{
            header("Location: /?page=login");
        }
        
    }
}

?>