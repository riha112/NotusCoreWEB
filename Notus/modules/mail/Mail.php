<?php
namespace Notus\Modules\Mail;

class Mail
{
    public static function mail($to, $subject, $message) : void {
        $headers = array(
            'From' => 'webmaster@example.com',
            'Reply-To' => 'webmaster@example.com',
            'X-Mailer' => 'PHP/' . phpversion()
        );

        mail($to, $subject, $message, $headers);
    }
}