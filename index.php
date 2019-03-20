<?php 
/*

    index.php 
    -----------------------------------------------
    This file recives all the requests from the url and forwards
    all the requests to the required controller via the router.

*/

session_start();
define("ROOT", dirname(__FILE__));
define("DS", DIRECTORY_SEPARATOR);

$url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : "";
$url = explode("/", ltrim($url, "/"));

//  including the helping and configuration file required for the application
if(file_exists(ROOT.DS."app".DS."helpers".DS."functions.php")){
    require_once(ROOT.DS."app".DS."helpers".DS."functions.php");
}
if(file_exists(ROOT.DS."config".DS."config.php")){
    require_once(ROOT.DS."config".DS."config.php");
}

if(file_exists(ROOT.DS."core".DS."bootstrap.php")){
    require_once(ROOT.DS."core".DS."bootstrap.php");    //  instantiating the application
}