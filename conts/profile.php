<?php


class profileController extends main{
    function __construct(){
        parent::__construct();
        
        if($this->checkAuth($_COOKIE) == false){
            header("Location: /?page=login");
            
        }
    }

    function main(){
        
        $this->views->render('profile/main', array(), array());
   }
      
   function logout(){
        @setcookie('user');
        $this->funcs->erase_session();

        header("Location: /?page=login");
        die;
    }
}
