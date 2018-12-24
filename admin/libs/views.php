<?php

class views{
    public $hi = 'hi';

    function __construct(){

        $this->hi;
        
    }
    function render($page){
        
        $files = explode('/', $page);
        
        require_once ("views/header.php");
        require_once ("views/".$files[0]."/".$files[1].".php");
        require_once ("views/footer.php");
        
    }

    function test(){
        echo 'test';
    }
}
