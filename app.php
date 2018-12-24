<?php
class app
{
    public $func;
    
    public $model;
    public $cont;
    function __construct(){
                
        $this->controller = new main();

    }

    
    function run($contName){
        
        switch($contName){
            case '/':
                $this->index();
            break;
            case 'login':
                $this->login();
            break;
            case 'profile':
                $this->profile();
            break;
            case 'board':
                $this->board();
            break;
            case 'user':
                $this->user();
            break;
            
            case '404':
                $this->no();
            break;
        }
    }


    public function index(){
        
        require_once("conts/index.php");
        $this->cont = new indexController();
        $this->cont->main();
        
    }    

    
    public function login(){
        
        require_once("conts/login.php");
        $this->cont = new loginController();
        
        if(isset($_POST['signin']) && $_POST['signin'] == 'login'){
            $this->cont->login();
        }else
            $this->cont->main();
        
        $this->cont->main();
    }   
        
    public function profile(){
        require_once("conts/profile.php");
        $this->cont = new profileController();
        if(isset($_GET['action']) AND $_GET['action'] == 'logout'){
            
            $this->cont->logout();
        }else{
            $this->cont->main();
        }
    }   
        
    public function board(){
        require_once("conts/board.php");

        
        $this->cont = new boardController();
        if(isset($_GET['id']) AND is_numeric($_GET['id']))
            $this->cont->main($_GET['id']);
        else{
            $this->cont->main();
        }
    }
      
    public function user(){
        require_once("conts/user.php");
        $this->cont = new userController();
    }
    
    public function no(){
        require_once("conts/no.php");
        $this->cont = new noController();
    }        
}
