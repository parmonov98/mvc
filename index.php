<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);


function iload($class){
    $path = 'libs/'.$class.'.php';
    if(file_exists($path)){
        require_once($path);
    }else{
        echo 'no file has been found!';
    }
	
}
spl_autoload_register('iload');


require_once ("app.php");
$app = new app();
if(!empty($_GET['page'])){
    $cont = is_string($_GET['page'])?$_GET['page']:'404';
}else{
    $cont = '/';
}

$app->run($cont);

?>