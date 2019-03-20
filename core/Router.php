<?php

class Router {

    public static function route($url) {
        //  getting the controller
        $controller = isset($url[0]) && $url[0] != "" ? ucwords($url[0]) : DEFAULT_CONTROLLER;
        $controller_name = $controller;
        array_shift($url);

        //  getting the action or method
        $action = isset($url[0]) && $url[0] != "" ? $url[0]."Action" : DEFAULT_ACTION;
        $action_name = $action;
        array_shift($url);

        //  query params
        $queryParams = $url;

        if(file_exists(ROOT.DS."app".DS."controllers".DS.$controller.".php")){
            $dispath = new $controller($controller_name, $action_name);
            if(method_exists($controller, $action_name)){
                call_user_func_array([$dispath, $action], $queryParams);
            }else{
                require_once(ROOT.DS."app".DS."views".DS."404.php");
            }
        }else{
            require_once(ROOT.DS."app".DS."views".DS."404.php");
        }

    }
}