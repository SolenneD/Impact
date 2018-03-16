<?php

namespace App\Controller;

use App\Repository\UsersRepository;
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
     * @Route("/test", name="site")
     */
    public function test(UsersRepository $usersRepository)
    {
        $posts = $usersRepository->findAll();
        return $this->render('site/test.html.twig', ['users'=>$posts]);
    }
}
