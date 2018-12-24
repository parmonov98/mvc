<?php

class main {
    public $cont;
    protected $views;
    private $funcs;
    static public $cnt = 0;
    function __construct(){
        
        $this->funcs = new functions();
        $this->funcs->init_session();
        #$this->model = new models();
        $this->views = new views();
        $this->cons = new connections();
        ++self::$cnt;
        
    }

    protected function checkAuth($post){
        
       if(isset($post['user'])){
        
        $sql = "SELECT * from `u_table` WHERE `u_table`.`u_name` = '".$post['user']."';";
        $users = $this->cons->select($sql);
        
        if($users[0]['u_type'] == 'admin' || $users[0]['u_type'] == 'owner'){
        if($users[0]['u_password'] === $post['pass']){
            $session1 = array(
                'name' => 'username', 
                'value' => $post['user']
            );
            
            $session2 = array(
                'name' => 'password', 
                'value' => $users[0]['u_password']
            );

            $cookie1 = array(
                'name' => 'user', 
                'value' => $post['user']
            );
            
            $cookie2 = array(
                'name' => 'pass', 
                'value' => $users[0]['u_password']
            );
            
            $this->funcs->set_session($session1);
            $this->funcs->set_session($session2);
            $this->funcs->set_cookie($cookie1);
            $this->funcs->set_cookie($cookie2);
            
            return true;
        }else{
            $cookie1 = array(
                'name' => 'user', 
                'value' => $post['user']
            );
            
            $cookie2 = array(
                'name' => 'pass', 
                'value' => $post['user']
            );

            $this->funcs->set_cookie($cookie1);
            $this->funcs->set_cookie($cookie2);
            
            
            return false;
        }
    }

        
    }else{
        $cookie1 = array(
            'name' => 'error', 
            'value' => 'No user has been found or exprire time is up !'
        );
        
        $cookie2 = array(
            'name' => 'errorView', 
            'value' => 0
        );
        
        $this->funcs->set_cookie($cookie1);
        $this->funcs->set_cookie($cookie2);
        return false;
    }
    
    }

    function signIn($post){
        if($post['login']){
            if(is_string($post['login'])){

                $sql = "SELECT * from `u_table` WHERE `u_table`.`u_name` = '".$post['login']."';";
               $users = $this->cons->select($sql);
               
               if($users[0]['u_password'] === md5($post['password'])){
                   $session1 = array(
                       'name' => 'username', 
                       'value' => $post['login']
                   );
                   
                   $session2 = array(
                       'name' => 'password', 
                       'value' => $users[0]['u_password']
                   );
   
                   $cookie1 = array(
                       'name' => 'user', 
                       'value' => $post['login']
                   );
                   
                   $cookie2 = array(
                       'name' => 'pass', 
                       'value' => $users[0]['u_password']
                   );
                   
                   $this->funcs->set_session($session1);
                   $this->funcs->set_session($session2);
                   $this->funcs->set_cookie($cookie1);
                   $this->funcs->set_cookie($cookie2);
                   print_r($_COOKIE);
                   return true;
               }else{
                   $cookie1 = array(
                       'name' => 'user', 
                       'value' => $post['login']
                   );
                   
                   $cookie2 = array(
                       'name' => 'pass', 
                       'value' => $post['login']
                   );
   
                   $this->funcs->set_cookie($cookie1);
                   $this->funcs->set_cookie($cookie2);
                   
                   $cookie1 = array(
                       'name' => 'error', 
                       'value' => $post['Your password is not correct!']
                   );
                   
                   $cookie2 = array(
                       'name' => 'errorView', 
                       'value' => 0
                   );
                   
                   $this->funcs->set_cookie($cookie1);
                   $this->funcs->set_cookie($cookie2);
   
                   return false;
               }
           }else{
               $cookie1 = array(
                   'name' => 'error', 
                   'value' => 'No user has been found or username is incorrect!'
               );
               
               $cookie2 = array(
                   'name' => 'errorView', 
                   'value' => 0
               );
               
               $this->funcs->set_cookie($cookie1);
               $this->funcs->set_cookie($cookie2);
   
               return false;
           }
        }
    }

    function createTasks($sences, $details){
        
        for($i = 0; $i < count($sences); $i++){
            $sql = "INSERT INTO `t_table` (`id`, `content`, `words`) VALUES 
            (NULL, '".$sences[$i]."', '".$details[$i]['numbers']."');";
            $handled[$i] = $this->cons->insert($sql);
        }

        if(is_array($handled))
            return true;    
        else
            return false;
        
    }
    
}
