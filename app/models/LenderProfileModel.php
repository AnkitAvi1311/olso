<?php 

class LenderProfileModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    // function to get all the products from the database
    public function getAllProducts() {
        $sql = "SELECT * from products WHERE lender_id = :id ORDER BY p_id DESC";
        $params = array(
            ":id" => $_SESSION['lender']['id']
        );
        $stmt = $this->__select($sql, $params);
        return $stmt;
    }

    // function to check if all the bank details are available before adding any product
    public function checkDetails() {
        $sql = "SELECT * FROM lenderdetails WHERE lender_id = :id";
        $params = array(
            ":id" => $_SESSION['lender']['id']
        );
        $stmt = $this->__select($sql, $params);
        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    //  function to add the details of the lender
    public function addDetails($sql, $params = null) {
        $stmt = $this->__insert($sql, $params);
        if($this->error == false) {
            return true;
        }else{
            return false;
        }
    } 

    //  function to get all the required details of the lender from the database
    public function getAllInfo() {
        $sql1 = "SELECT COUNT(lender_id) totalFollowers from followers where lender_id = :id";
        $params = array(
            ":id" => $_SESSION['lender']['id']
        );
        $stmt = $this->__select($sql1, $params);
        $row = $stmt->fetch();
        $totalFollowers = $row['totalFollowers'];
        $sql = "SELECT SUM(amount) totalEarnings from app_transactions WHERE lender_id = :id";
        $params = array(
            ":id" => $_SESSION['lender']['id']
        );
        $stmt = $this->__select($sql, $params);
        $row = $stmt->fetch();
        $details = array(
            "followers" => $totalFollowers,
            "earning" => $row['totalEarnings']
        );
        return $details;
    }

    //  function to calculate and send the rating to the controller
    public function calculateRating() {
        $sql = "SELECT count(rating) totalUser, sum(rating) rating , AVG(rating) average_rating from lender_ratings WHERE lender_id = :id";
        $params = array(
            ":id" => $_SESSION['lender']['id']
        );
        $stmt = $this->__select($sql, $params);
        $row = $stmt->fetch();
        $rating = round($row['average_rating'], 2);
        return $rating;
    }

    //  function to return the password hint from the database
    public function passHint($email) {
        $sql = "SELECT pwd_hint from lender_login WHERE email = :email";
        $params = array(
            ":email" => $email
        );
        $stmt = $this->__select($sql, $params);
        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch();
            return $row['pwd_hint'];
        }else{
            return false;
        }
    }

    //  function to change the password and delete the password hint from the database
    public function resetPassword($data, $data2) {
        extract($data);
        extract($data2);
        $password = password_hash($password, PASSWORD_DEFAULT);
        if(password_verify($confirm, $password)) {
            $sql = "UPDATE lender_login SET pwd = :pwd WHERE email = :email";
            $params = array(
                ":pwd" => $password,
                ":email" => $email
            );
            $this->__update($sql, $params);
            $sql = "UPDATE lender_login SET pwd_hint = null WHERE email = :email";
            $params = array(
                ":email" => $email
            );
            $this->__update($sql, $params);
            header("location: ".PROOT."lenders/login?msg=Password changed successfully");
            exit();
        }else{
            header("location: ".PROOT."lenders/reset?email=".$email."&hint=".$hint."&err=Password didn't match");
            exit();
        }
    } 
}