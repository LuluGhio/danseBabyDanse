<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\createFormBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function newContact(Request $request, EntityManagerInterface $entityManager): Response{
        
        $entityManager = $this->getDoctrine()->getManager();
        
        $contact = new Contact(); // $contact is an empty contact object, ready to be completed
        
        // createFormBuilder() creates a form binded to $contact
        $form = $this->createForm(ContactType::class, $contact); // here $contact is the entity

        //FORM TREATMENT
        $form->handleRequest($request); // analysing the request: submitted or not
        
        if($form->isSubmitted() && $form->isValid()){
            //saving the query
            $entityManager->persist($contact);
            // executes the query
            $entityManager->flush();
            return $this->render('contact/merci.html.twig');
        }

        // now I want to display the form via twig
        return $this->render('contact/contact.html.twig',[
            'formContact' => $form->createView()
            // createView() is a method from the FORM CLASS to make the displaying
            ]);
    }
}
