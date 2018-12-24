<?php


class indexController extends main{
    function __construct(){
        parent::__construct();
        
    }

    function main(){
        $this->views->render('index/main', array(), array());
   }


   
   function logout(){
    echo 2;
    $this->funcs->erase_session();
    $cookie = array(
        'name' => 'username',
        'value' => ''
    );
    $this->funcs->set_cookie($cookie);
    header("Location: /?page=login");
    $this->views->render('index/main', array(), array());
}
}
