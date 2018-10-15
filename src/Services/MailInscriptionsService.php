<?php

namespace App\Services;

class MailInscriptionsService
{
	private $mailer;	// je définis l'attribut mailer

	public function __construct(\Swift_Mailer $mailer){
		$this->mailer = $mailer;
	}

	public function sendMailRegister($mailInscriptions){    // $mailInscriptions est le nom du service

    $message = (new \Swift_Message('Pré-inscription bien reçue')) // $message est un objet swift_message
        ->setFrom('ghiolucile@gmail.com')
        ->setTo($mailInscriptions)        // => récupérer email du form envoyé
        ->setBody(
            $this->templating->render(
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