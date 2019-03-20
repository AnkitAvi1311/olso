<?php 

session_start();
require_once("../config/database.php");

if($_GET['email']) {
    extract($_GET);
    //  setting up the database
    try{
        $conn = new PDO(DSN, USER, PASSWORD, PDO_OPTIONS);
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
    //  query for updating the password hint
    $passwordHint = password_hash($email, PASSWORD_DEFAULT);
    $SQL = "UPDATE lender_login SET pwd_hint = :pwd_hint WHERE email = :email";
    $params = array(
        ":pwd_hint" => $passwordHint,
        ":email" => $email
    );

    $stmt = $conn->prepare($SQL);
    foreach($params as $key => &$value) {
        $stmt->bindParam($key, $value);
    }

    $stmt->execute();

    if($stmt->rowCount() > 0) {
        $to = $email;
        $subject = "OLSO : Password Reset Mail";
        $message = "
            <html>
            <head>
            <title>OLSO : Link to reset the password </title>
            </head><body>
            <b> Hi $email, </b><br/>
            <p>We received a request to reset your OLSO Lender's account passsword. </p>
            <p>Click on the link below to reset your password</p>
            <a href='localhost/olso/lenders/reset?email=$email&hint=$passwordHint'>Reset Password</a>
            </body>
            </html>
        ";
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: OLSO' . "\r\n";
        $headers .= 'Cc: myboss@example.com' . "\r\n";


        mail($to, $subject, $message, $headers);
    }else{
        echo "Mail sending failed";
    }

}else{
    echo "You are not authorised buddy.";
}