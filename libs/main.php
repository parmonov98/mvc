<?php

class main {
    public $cont;
    protected $views;
    protected $funcs;
    static public $cnt = 0;
    function __construct(){
        
        $this->funcs = new functions();
        $this->funcs->init_session();
        #$this->model = new models();
        $this->views = new views();
        $this->connections = new connections();
        ++self::$cnt;
        
    }

    protected function checkAuth($post){
        
       if(isset($post['user'])){
        
        $sql = "SELECT * from `u_table` WHERE `u_table`.`u_name` = '".$post['user']."';";
        $users = $this->connections->select($sql);
        
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
               $users = $this->connections->select($sql);
               
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

    function selectAll(){
        $sql = "SELECT * from `t_table` ";
        $users = $this->connections->select($sql);
        print_r($users);
        return $users;
    }
    function getSentenceById($id){
        $sql = "SELECT * from `t_table` WHERE id = ".$id;
        $result = $this->connections->select($sql);
        return $result;

    }
}
