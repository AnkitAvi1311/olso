<?php 

class LenderSignupModel extends Model {

    public $sign_status = false;
    private $info = null;

    public function __construct($data) {
        parent::__construct();
        $this->info = $data;
        $this->__signup();
    }

    private function __signup() {
        //  extracting the user info 
        $fname = htmlspecialchars(filter_var($this->info['fname'], FILTER_SANITIZE_STRING));
        $email = htmlspecialchars(filter_var($this->info['email'], FILTER_SANITIZE_EMAIL));
        $phone = htmlspecialchars($this->info['phone']);
        $pwd = htmlspecialchars(password_hash($this->info['password'], PASSWORD_DEFAULT));
        $profile_name = 'default.jpg';
        $dir = ROOT.DS."uploads".DS."lender_profile_pic".DS;
        $target_dir = "";
        $sql = "INSERT INTO lender_login (fname, email, phone, pwd, c_profile) VALUES (:fname, :email, :phone, :pwd, :profile_name)";
        if(is_uploaded_file($_FILES['profile']['tmp_name'])){
            $profile_name = $_FILES['profile']['name'];
            $params = array(
                ":fname" => $fname,
                ":email" => $email,
                ":phone" => $phone,
                ":pwd" => $pwd,
                ":profile_name" => $profile_name
            );
            $this->__insert($sql, $params);
            if($this->error === false) {
                $target_dir = $dir.$fname.$phone.$_FILES['profile']['name'];
                move_uploaded_file($_FILES['profile']['tmp_name'], $target_dir);
            }
        }else{
            $params = array(
                ":fname" => $fname,
                ":email" => $email,
                ":phone" => $phone,
                ":pwd" => $pwd,
                ":profile_name" => $profile_name
            );
            $this->__insert($sql, $params);
        }

        if($this->error) {
            $this->sign_status = false;
        }else{
            $this->sign_status = true;
        }

    }

    public function returnError () {
        if($this->error === true && $this->sign_status === false) {
            return $this->err_info;
        }else{
            return false;
        }
    }
}