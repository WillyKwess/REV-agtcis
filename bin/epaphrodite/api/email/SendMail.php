<?php

namespace bin\epaphrodite\api\email;

class SendMail extends EmailSetting
{

    /**
     * *******************************************************************************************
     * Send messages
     *
     * @param array $contacts|null
     * @param string $MsgHeader|null
     * @param string $MsgContent|null
     * @param string $file|null
     * @return void
     */
    public function SendEmailToCostumers(?array $contacts = null, ?string $MsgHeader = null, ?string $MsgContent = null, ?string $file = null)
    {

        if ($this->settings() === true) {
            //Recipients
            foreach ($contacts as $k => $value) {
                $this->PHPMailer()->addAddress($contacts[$k]);
            }

            //$this->PHPMailer()->addReplyTo('info@example.com', 'Information');
            //$this->PHPMailer()->addCC('cc@example.com');
            //$this->PHPMailer()->addBCC('bcc@example.com');

            // Attachments
            //$this->PHPMailer()->addAttachment('/var/tmp/file.tar.gz');
            if ($file != null) {
                $this->PHPMailer()->addAttachment(_DIR_FILES_, $file);
            }

            // Chrager le contenu du mail
            $this->content($MsgHeader, $MsgContent);

            // Verifier l'envoi du mail
            if ($this->PHPMailer()->send()) {
                return true;
            } else {

                return false;
            }
        }
    }

    /**
     * *******************************************************************************************
     * Get content of header and content of email
     *
     * @param string $MsgHeader
     * @param string $MsgContent
     * @return void
     */
    private function content(string $MsgHeader, string $MsgContent)
    {

        $this->PHPMailer()->isHTML(true);
        $this->PHPMailer()->Subject = $MsgHeader;
        $this->PHPMailer()->Body    = $MsgContent;
        //$this->PHPMailer()->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }
}
