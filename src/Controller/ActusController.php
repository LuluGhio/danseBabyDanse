<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Actus;
use App\Repository\ActusRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ActusController extends Controller
{

    /**
     * @Route("/actus", name="allActus")
     */
    // displaying all actus:
    public function home(Request $request, EntityManagerInterface $entityManager) :Response
    {
        $eventDate = new \DateTime(); 
        // $eventDate = les dates supp à la date du moment où on fait la requête
        $actus = $this->getDoctrine()
                        ->getRepository(Actus::class)
                        ->findAll();

        return $this->render('actus/allActus.html.twig', [
            'controller_name' => 'ActusController',
            'actus' => $actus,
        ]);
    }
}
