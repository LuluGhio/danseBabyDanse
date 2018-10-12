<?php

namespace App\Services;

class MailInscriptionsService
{
	public function MailInscriptions($mailInscriptions, \Swift_Mailer $mailer){    // $mailInscriptions est le nom du service

    $message = (new \Swift_Message('Pré-inscription bien reçue')) // $message est un objet swift_message
        ->setFrom('ghiolucile@gmail.com')
        ->setTo('lucileghio@live.fr')        // => récupérer email du form envoyé
        ->setBody(
            $this->renderView(
                'inscriptions/mailInscriptions.html.twig',
                array('name' => $mailInscriptions)
            ),
            'text/html'
        )
    ;

    $mailer->send($message);

    return $this->render('inscriptions/mailInscriptions.html.twig');
    }

}