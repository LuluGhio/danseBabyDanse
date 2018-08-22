<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Actus;
use App\Repository\ActusRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class HomeController extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(Request $request, EntityManagerInterface $entityManager) :Response
    {
        $eventDate = new \DateTime(); 
        // $eventDate = les dates supp à la date de mtn où on fait la requête
        $actus = $this->getDoctrine()
                        ->getRepository(Actus::class)
                        ->findByExampleField($eventDate);

        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
            'actus' => $actus,
        ]);
    }

   
}
