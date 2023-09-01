<?php

namespace bin\epaphrodite\api\email;

use bin\epaphrodite\define\config\SetMail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailSetting extends SetMail{

    /**
     * Instantiation and passing `true` enables exceptions
    */
    protected function PHPMailer(){

        return new PHPMailer(true);
    }

    /**
     * email setting
     * @return void
    */
    protected function settings()
    {

        try {

            $this->PHPMailer()->SMTPDebug = SMTP::DEBUG_SERVER;
            $this->PHPMailer()->isSMTP();
            $this->PHPMailer()->Host       = $this->MailSetting['host'];
            $this->PHPMailer()->SMTPAuth   = true;
            $this->PHPMailer()->Username   = $this->MailSetting['from'];
            $this->PHPMailer()->Password   = $this->MailSetting['password'];
            $this->PHPMailer()->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->PHPMailer()->Port       = $this->MailSetting['port'];
            $this->PHPMailer()->setFrom( $this->MailSetting['fakemail'] , $this->MailSetting['title'] );

            return true;
        } catch (Exception $e) {

            return false;
        }
    }
}