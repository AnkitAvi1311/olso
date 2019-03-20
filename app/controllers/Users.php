<?php 

class Users extends Controller {

    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        if(isset($_SESSION['user'])) {
            header("location: ".PROOT);
            exit();
        }
    }

    public function indexAction() {
        $this->view->render("users/signup");
    }

    public function signupAction() {
        if(isset($_POST['submit'])){
            
        }else{
            $this->view->render("users/signup");
        }
    }

    public function loginAction() {

    }

}