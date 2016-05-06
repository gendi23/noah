<?php
/**
 * Created by PhpStorm.
 * User: Yutcelinis
 * Date: 18/07/2015
 * Time: 6:42
 */

class SendEmail {

    public function setMailer(){
        $mail= new PHPMailer();
        //$config = new Config();

        $mail->IsSMTP();
        $mail->Host = Config::$hostSMTP;
        $mail->Port = Config::$port;
        $mail->SMTPAuth = true;
        $mail->Username = Config::$userSMTP;
        $mail->Password = Config::$passSMTP;
        $mail->SMTPSecure = 'tls';
        $mail->IsHTML(true);

        return $mail;
    }

    public function sendAll( $subject, $body, $to){
        $mail= self::setMailer();

        $mail->From =Config::$fromAddress;
        $mail->FromName = Config::$fromName;
        $mail->Subject = $subject;
        $mail->Body =$body;


        foreach ($to as $email) {
            $mail->AddAddress($email);
            $mail->Send();
            $mail->ClearAddresses();
        }

    }
    public function sendOne( $subject, $body, $email,$adjunt=null){
        $mail= self::setMailer();

        $mail->From =Config::$fromAddress;
        $mail->FromName =Config::$fromName;
        $mail->Subject = $subject;
        $mail->Body =$body;

            $mail->AddAddress($email);
            $mail->Send();
            $mail->ClearAddresses();
    }
}

?> 