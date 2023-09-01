<?php

namespace bin\epaphrodite\define\lang\fr;

class SetFrenchTextMessages
{
    private $AllMessages;

    public function SwithAnswers($MessageCode)
    {

        $this->AllMessages[] =
            [
                'language' => 'french',
                '403-title' => 'ERREUR 403',
                '404-title' => 'ERREUR 404',
                '419-title' => 'ERREUR 419',
                '500-title' => 'ERREUR 500',
                '403' => 'Acces restreint !!!',
                'back' => "Retour page d'accueil",
                'author' => 'Agence Epaphrodite',
                'description' => 'agence epaphrodite',
                'denie' => "Traitement impossible !!!",
                '419' => 'Votre session a expirée !!!',
                'site-title' => 'APPLICATION DE GESTION DE TRACAGE DES CARTES D\'INDETITE SCOLAIRE(AGTCIS)',
                'mdpnotsame' => 'mot de passe incorrecte',
                '404' => 'Oops! Aucune page trouvée !!!',
                '500' => 'Internal server error',
                'error_text' => 'Erreur txt epaphrodite',
                'noformat' => 'Le format du fichier incorrecte !',
                'vide' => 'Veuillez remplir tous champs svp !!!',
                'login-wrong' => 'Login ou mot de passe incorrecte',
                'succes' => 'Traitement effectué avec succès !!!',
                'session_name' => 'session'._MAIN_EXTENSION_,
                'token_name' => 'token_crf'._MAIN_EXTENSION_,
                'no-identic' => 'Désolé les mots de passes ne sont pas identiques',
                'mdpwrong' => "L'ancien mot de passe est incorrecte",
                'connexion' => 'Veuillez vous reconnecter à nouveau svp !',
                'rightexist' => 'Désolé ce droit existe déjà pour ce utilisateur',
                'send' => 'Félicitation votre message a été envoyé avec succès !!!',
                'no-data' => 'Désolé aucune information ne correspond à votre demande',
                'done' => 'Félicitation votre inscription a été effectué avec succès !!!',
                'error' => "Désolé un problème est survenu lors du traitement !!!",
                'errordeleted' => "Désolé un problème est survenu lors de la suppression !!!",
                'errorsending' => "Désolé un problème est survenu lors de l'envoi de votre message !!!",
                'keywords' => "Epaphrodite framework  , Création; site web; digitale; community manager;",
            ];

        return $this->AllMessages[0][$MessageCode];
    }
}
