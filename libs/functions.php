<?php
class functions{



    function init_session(){
        @session_start();
    }

    function set_session($session){
        $_SESSION[$session['name']] = $session['value'];
    }

    
    function get_session($session){
        
        if(isset($_SESSION[$session])){
            return $_SESSION[$session];
        }else return false;
    }

    function erase_session(){
        
        session_destroy();
        //echo 'session have been destroyed!';
    }


    
    
    function set_cookie($cookie){
        /*print_r($cookie);
        echo '</br>'*/
        setcookie($cookie['name'], $cookie['value']); // 86400 = 1 day, time() + (86400 * 30), "/"
        #print_r($_COOKIE);
    }

    
    function get_cookie($cookie){
        
        if(isset($_COOKIE[$cookie]))
            return $_COOKIE[$cookie['name']];
        else return false;
    }

    function erase_cookie(){

    }
}

?>