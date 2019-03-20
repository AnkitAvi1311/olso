<?php 

class Lenders extends Controller {

    //  constructor function for lenders controller
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
    }
    
    //  welcome page for the lenders
    public function indexAction() {
        if(isset($_SESSION['lender'])){
            $this->view->render("lender/profile");
        }else{
            $this->view->render("lender/home");
        }
    }

    //  lender's login function
    public function loginAction() {
        if(!isset($_SESSION['lender'])){
            if(isset($_POST['submit'])){
                $login = new LenderLoginModel($_POST);
                $status = $login->status();
                if($status !== true) {
                    header("location: ".PROOT."lenders/login?error=".$status);
                    exit();
                }else{
                    header("location: ".PROOT."lenders");
                    exit();
                }
            }else{
                $this->view->render("lender/lender_login");
            }
        }else{
            header("location: ".PROOT."lenders");
            exit();
        }
    }

    //  lender's signup function
    public function registerAction() {
        if(!isset($_SESSION['lender'])){
            if(isset($_POST['submit'])){
                $new_user = new LenderSignupModel($_POST);
                if(!($new_user->returnError()===false)){
                    if(stristr($new_user->returnError(), "duplicate")) {
                        header("location: ".PROOT."lenders/register?error=Lender profile Already Exists");
                        exit();
                    }else{
                        header("location: ".PROOT."lenders/register?error=".$new_user->returnError());
                        exit();
                    }
                }else{
                    header("location: ".PROOT."lenders/register?msg=Registeration successful. Please <b>LOGIN</b> to continue");
                    exit();
                }
            }else{
                $this->view->render("lender/lender_register");
            }
        }else{
            header("location: ".PROOT."lenders");
            exit();
        }
    }

    //  function to logout the lender
    public function logoutAction() {
        session_unset();
        session_destroy();
        header("location: ".PROOT."lenders");
        exit();
    }

    //  function to change password of the lender
    public function changepasswordAction() {
        if(isset($_SESSION['lender'])){
            if(isset($_POST['submit'])){
                $changePassword = new LenderChangePassword($_POST);
                $status = $changePassword->returnStatus();
                if($status==null) {
                    header("location: ".PROOT."lenders/changepassword?msg=Password changed successfully");
                    exit();
                }else{
                    header("location: ".PROOT."lenders/changepassword?err=".$status);
                    exit();
                }
            }else{
                $this->view->render("lender/change-password");
            }
        }else{
            header("location: ".PROOT."lenders");
            exit();
        }
    }

    //  controller function for adding products
    public function addproductAction($queryParams = null) {
        $profile = new LenderProfileModel();
        if($profile->checkDetails()) {
            //  When the details are already available
            if(isset($_POST['submit'])){
                $ob = new AddProduct();
                if($ob->addProduct($_POST)) {
                    header("location: ".PROOT."lenders/addproduct/success");
                    exit();
                }
            }else{
                $this->view->render("lender".DS."add_product", $queryParams);
            }
        }else{
            //  when the details are not available
            $this->view->render("lender".DS."add_details", $queryParams);
        }
    }

    //  lender details required before adding item to lend
    public function adddetailsAction() {
        if(isset($_POST['submit'])){
            $lender_id = $_SESSION['lender']['id'];
            $address = htmlspecialchars($_POST['address']);
            $city = htmlspecialchars($_POST['city']);
            $state = htmlspecialchars($_POST['state']);
            $panNumber = htmlspecialchars($_POST['PAN']);
            $bankDetails = json_encode(array(
                "gst" => $_POST['gst'],
                "ifsc" => $_POST['ifsc'],
                "account_number" => $_POST['account']
            ));
            $sql = "INSERT into lenderDetails(lender_id, panNumber, address, city, state, backDetails) VALUES (:lender_id, :panNumber, :address, :city, :state, :backDetails) ";
            $params = array(
                ":lender_id" => $lender_id,
                ":panNumber" => $panNumber,
                ":address" => $address,
                ":city" => $city,
                ":state" => $state,
                ":backDetails" => $bankDetails
            );
            $details = new LenderProfileModel();
            $stmt = $details->addDetails($sql, $params);
            if($stmt) {
                header("location: ".PROOT."lenders/addproduct");
                exit();
            }else{
                header("location: ".PROOT."lenders/addproduct?err=Record addition failed");
                exit();
            }
        }
    }

    // controller method for edit-profile
    public function editprofileAction() {
        if(isset($_POST['submit'])){
            
        }else{
            $this->view->render("lender".DS."edit_profile");
        }
    }

    //  function to reset the password
    public function resetAction() {
        if(isset($_GET['email']) && isset($_GET['hint'])) {
            $lender = new LenderProfileModel();
            $pwd_hint = $lender->passHint($_GET['email']);
            if(strcmp($pwd_hint, $_GET['hint'])===0){
                $this->view->render("lender".DS."reset");
                if(isset($_POST['submit'])){
                    $lender->resetPassword($_GET, $_POST);
                }
            }else{
                header("location: ".PROOT."lenders/login");
                exit();
            }
        }else{
            header("location: ".PROOT."lenders/login");
            exit();
        }
    }
}