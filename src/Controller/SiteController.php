<?php

namespace App\Controller;

use App\Repository\TrainingRepository;
use App\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class SiteController extends Controller
{
    /**
     * @Route("/", name="site")
     */
    public function index()
    {
        return $this->render('site/index.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }
    /**
    * @Route("/info", name="site")
    */
    public function InfoUser(UsersRepository $usersRepository)
    {
        $posts = $usersRepository->findAll();
        return $this->render('site/InfoUser.html.twig', ['users'=>$posts]);
    }
    /**
     * @Route("/training", name="site")
     */
    public function training(TrainingRepository $trainingRepository)
    {
        $tra = $trainingRepository->findAll();

        return $this->render('site/training.html.twig', array('viewTra' => $tra));
    }
}
