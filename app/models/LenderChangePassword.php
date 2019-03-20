<?php

class LenderChangePassword extends Model {
    public function __construct($data) {
        parent::__construct();
        $this->changePassword($data);
    }

    private function changePassword($data) {
        $oldPassword = htmlspecialchars($data['oldpassword']);
        $newPassword = password_hash(htmlspecialchars($data['password']),PASSWORD_DEFAULT);
        $confirm = htmlspecialchars($data['confirm']);
        $sql = "SELECT pwd from lender_login WHERE lender_id = :id ";
        $params = array(
            ":id" => $_SESSION['lender']['id']
        );
        $stmt = $this->__select($sql, $params);
        $row = $stmt->fetch();
        if(password_verify($oldPassword, $row['pwd'])){
            //  when the old password entered is correct
            if(password_verify($confirm, $newPassword)){
                extract($_SESSION['lender']);
                $sql = "UPDATE lender_login SET pwd = :newPassword WHERE lender_id = :id";
                $params = array(
                    ":newPassword" => $newPassword,
                    ":id" => $id
                );
                $stmt = $this->__update($sql, $params);
                $this->error = false;
                $this->err_info = null;
            }else{
                $this->error = true;
                $this->err_info = "Password entered didn't match";
            }
        }else{
            //  code when the old password entered in incorrect
            $this->error = true;
            $this->err_info = "Entered incorrect old password";
        }
    }

    public function returnStatus() {
        return $this->err_info;
    }

}