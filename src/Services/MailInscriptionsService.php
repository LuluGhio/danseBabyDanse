<?php

namespace App\Services;

class MailInscriptionsService
{
	private $mailer;		// set the $mailer attribute
	private $templating;	// set the $templating attribute

	public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating){
		$this->mailer = $mailer;
		$this->templating = $templating;
	}

	public function sendMailRegister($mailInscriptions){    // $mailInscriptions is the service's name
	    $message = (new \Swift_Message('Pré-inscription bien reçue')) // $message is a swift_message object
	        ->setFrom('ghiolucile@gmail.com')
	        ->setTo($mailInscriptions)        // => $mailInscrition = email from submitted form
	        ->setSubject('DanseBabyDanse : pré-inscription validée')
	        ->setBody(
	            $this->templating->render('inscriptions/mailInscriptions.html.twig',
	                array('name' => $mailInscriptions)
	            ),
	            'text/html'
	        )
	    ;

	    $this->mailer->send($message);

	    return $this->templating->render('inscriptions/merci.html.twig');
    }

}