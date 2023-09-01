<?php

namespace bin\epaphrodite\define\lang\eng;

class SetEnglishTextMessages
{
    private $AllMessages;

    public function SwithAnswers($MessageCode)
    {

        $this->AllMessages[] =
            [
                'language' => 'english',
                '403-title' => 'ERROR 403',
                '404-title' => 'ERROR 404',
                '419-title' => 'ERROR 419',
                '500-title' => 'ERROR 500',
                'session_name' => 'ep_session',
                'token_name' => 'token_crf_ep',
                '403' => 'Acces denie !!!',
                'back' => "Back to home page",
                'author' => 'Epaphrodite Agency',
                'description' => 'agence epaphrodite',
                'denie' => "Treatment not possible !!!",
                '419' => 'Your session has expired !!!',
                'site-title' => 'SCHOOL INDETITY CARD TRACKING MANAGEMENT APPLICATION (AGTCIS)',
                'mdpnotsame' => 'incorrect password',
                '404' => 'Oops! No pages found !!!',
                '500' => 'Internal server error',
                'error_text' => 'Error txt epaphrodite',
                'noformat' => 'Incorrect file format !',
                'no-identic' => 'Sorry passwords are not identic',
                'vide' => 'Please fill in all the requirements please !!!',
                'login-wrong' => 'Incorrect login or password',
                'succes' => 'Processing completed successfully !!!',
                'session_name' => 'session'._MAIN_EXTENSION_,
                'token_name' => 'token_crf'._MAIN_EXTENSION_,
                'mdpwrong' => "The old password is incorrect",
                'connexion' => 'Please log in again !',
                'rightexist' => 'Sorry this right already exists for this user',
                'send' => 'Congratulations your message has been sent successfully !!!',
                'no-data' => 'Sorry no information corresponds to your request',
                'done' => 'Congratulations, your registration has been successfully completed !!!',
                'error' => "Sorry there was a problem registering !!!",
                'errordeleted' => "Sorry there was a problem deleting !!!",
                'errorsending' => "Sorry, there was a problem sending your message !!!",
                'keywords' => "Epaphrodite framework  , Creation; site web; digitale; community manager;",
            ];

        return $this->AllMessages[0][$MessageCode];
    }
}
