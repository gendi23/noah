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
        $config = new Config();

        $mail->IsSMTP();
        $mail->Host = $config->hostSMTP;
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = $config->userSMTP;
        $mail->Password = $config->passSMTP;
        $mail->SMTPSecure = 'tls';
        $mail->IsHTML(true);

        return $mail;
    }

    public function sendAll($from, $fromName, $subject, $body, $to){
        $mail= self::setMailer();

        $mail->From =$from;
        $mail->FromName = $fromName;
        $mail->Subject = $subject;
        $mail->Body =$body;


        foreach ($to as $email) {
            $mail->AddAddress($email);
            $mail->Send();
            $mail->ClearAddresses();
        }

    }
    public function sendOne($from, $fromName, $subject, $body, $email){
        $mail= self::setMailer();

        $mail->From =$from;
        $mail->FromName = $fromName;
        $mail->Subject = $subject;
        $mail->Body =$body;

            $mail->AddAddress($email);
            $mail->Send();
            $mail->ClearAddresses();
    }
}

?> 