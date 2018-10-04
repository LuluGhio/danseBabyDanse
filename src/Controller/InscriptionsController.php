<?php

namespace App\Controller;

use App\Entity\Inscriptions;
use App\Form\InscriptionsType;
use App\Repository\InscriptionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\createFormBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionsController extends Controller
{
    /**
     * @Route("/inscriptions", name="inscriptions")
     */
    public function newInscriptions(Request $request, EntityManagerInterface $entityManager): Response{
    
    $birthDate = new \DateTime(); 

    $entityManager = $this->getDoctrine()->getManager();
    
    $ins = new Inscriptions(); // $ins is an empty inscription object, ready to be completed
    
    // createFormBuilder() creates a form binded to $ins
    $form = $this->createForm(InscriptionsType::class, $ins); // here $ins is the entity

    //FORM TREATMENT
    $form->handleRequest($request); // analysing the request: submitted or not
    
    if($form->isSubmitted() && $form->isValid()){
        //saving the query
        $entityManager->persist($ins);
        // executes the query
        $entityManager->flush();
        // when everything is ok
        return $this->render('inscriptions/merci.html.twig');
    }

    // now I want to display the form via twig
    return $this->render('inscriptions/index.html.twig',[
        'formInscriptions' => $form->createView()
        // createView() is a method from the FORM CLASS to make the displaying
        ]);
    }
}
