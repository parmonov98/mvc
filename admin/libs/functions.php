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
    }


    
    
    function set_cookie($cookie){
        /*print_r($cookie);
        echo '</br>'*/
        setcookie($cookie['name'], $cookie['value'], time() + (86400 * 30), "/"); // 86400 = 1 day
        #print_r($_COOKIE);
    }

    
    function get_cookie($cookie){
        
        if(isset($_COOKIE[$cookie]))
            return $_COOKIE[$cookie['name']];
        else return false;
    }
}

?>