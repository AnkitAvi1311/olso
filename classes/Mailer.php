<?php

class Mailer {
    public function signupMail($to, $fname) {
        $subject = "OLSO : New Lender account created";
        $message = "
            <html>
            <head>
            <title>OLSO : Registeration Successful</title>
            </head><body>
            <b> Hi $fname, </b><br/>
            <p>Your registeration to become a lender on OLSO has been accepted. </p>
            <p>You can now continue to add your products on the website.</p>
            </body>
            </html>
        ";
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: OLSO' . "\r\n";
        mail($to, $subject, $message, $headers);
    }
}