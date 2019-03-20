<?php 

class View {
    
    public function render($view_name, $param = null) {
        if(file_exists(ROOT.DS."app".DS."views".DS.$view_name.".php")){
            require_once(ROOT.DS."app".DS."views".DS.$view_name.".php");
        }else{
            require_once(ROOT.DS."app".DS."views".DS."404.php");
        }
    }

}