<?php

namespace app\facades;

use PHPMailer;

class Mailer
{
    public static function mail($address, $subject, $body)
    {
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = env('MAIL_HOST');                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = env('MAIL_USERNAME');               // SMTP username
        $mail->Password = env('MAIL_PASSWORD');               // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
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
}