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
    public function home()
    {
        return $this->render('home/home.html.twig'); // render allows to call for the twig file
    }

    public function displayActus(Request $request, EntityManagerInterface $entityManager) :Response{

        $actus = $this->getDoctrine()
                        ->getRepository(Actus::class)
                        ->findByExampleField($eventDate);

        return $this->render('home/home.html.twig');
    }
   
}
