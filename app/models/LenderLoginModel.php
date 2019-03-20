<?php 

class LenderLoginModel extends Model {
    private $info;
    protected $status;

    public function __construct($data) {
        parent::__construct();
        $this->info = $data;
        $this->__login();
    }

    private function __login() {
        $email = htmlspecialchars(filter_var($this->info['email'], FILTER_SANITIZE_EMAIL));
        $password = htmlspecialchars($this->info['password']);
        $sql = "SELECT * from lender_login WHERE email = :email LIMIT 1";
        $params = array(
            ":email" => $email
        );
        $stmt = $this->__select($sql, $params);
        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch();
            if(password_verify($password, $row['pwd']) === true){
                $lender = array(
                    "id" => $row['lender_id'], 
                    "fname" => $row['fname'],
                    "email" => $row['email'],
                    "phone" => $row['phone'],
                    "profile" => $row['c_profile']
                );
                $_SESSION['lender'] = $lender;
                $this->error = false;
            }else{
                $this->error = true;
                $this->err_info = "Password didn't match";
            }
        }else{
            $this->error = true;
            $this->err_info = "User Not Found";
        }
    }

    public function status () {
        if($this->error == false) {
            return true;
        }else{
            return $this->err_info;
        }
    }
}