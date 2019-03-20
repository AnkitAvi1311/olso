<?php 

//  autloading all the required classes automatically
function __autoload($class_name) {
    if(file_exists(ROOT.DS."app".DS."controllers".DS.$class_name.".php")){
        require_once(ROOT.DS."app".DS."controllers".DS.$class_name.".php");
    }else if(file_exists(ROOT.DS."app".DS."models".DS.$class_name.".php")){
        require_once(ROOT.DS."app".DS."models".DS.$class_name.".php");
    }else if(file_exists(ROOT.DS."classes".DS.$class_name.".php")){
        require_once(ROOT.DS."classes".DS.$class_name.".php");
    }else{
        require_once(ROOT.DS."core".DS.$class_name.".php");
    }
}

//  loading the database configurations here
require_once(ROOT.DS."config".DS."database.php");
Router::route($url);