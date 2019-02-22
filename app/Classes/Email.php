<?php

namespace App\Classes;

use Mail;
use Log;

class Email
{
    public function sendEmail($template, $data)
    {
    	$mail = Mail::queue($template, $data,
            function($message) use($data) {
              // pergantian header email
                $message->from('no-reply@rudiantotiofan.com', 'no-reply@rudiantotiofan.com');
                $message->to($data['email'], $data['email'])->subject($data['subject_email']);

                if (array_key_exists('cc', $data)) {
                	$message->to($data['cc']);
                }

                if (array_key_exists('attach', $data)) {
                    $message->attach($data['attach']);
                }
            });
        return true;
    }
}
