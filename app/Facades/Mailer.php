<?php

namespace app\facades;

use PHPMailer;

class Mailer
{
    public static function sendVerificationMail($address, $subject, $body)
    {
        $verificationToken = self::generateVerificationToken();
        str_replace("{{VerificationToken}}", $verificationToken, $body);

        $isSuccess = self::sendMail($address, $subject, $body);

        return $isSuccess ? $verificationToken : false;
    }

    private static function sendMail($address, $subject, $body)
    {
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = env('MAIL_HOST');                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = env('MAIL_USERNAME');               // SMTP username
        $mail->Password = env('MAIL_PASSWORD');               // SMTP password
        $mail->SMTPSecure = env('MAIL_ENCRYPTION');           // Enable TLS encryption, `ssl` also accepted
        $mail->Port = env('MAIL_PORT'); ;                     // TCP port to connect to
        $mail->setFrom(env('MAIL_USERNAME'), 'Clear Note');
        $mail->addAddress($address);                          // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $body;

        if(!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }

    private static function generateVerificationToken()
    {
        return hash_hmac('sha256', str_random(40), env('app_key'));
    }
}