<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('site/index.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }
    /**
     * @Route("/training", name="training")
     */
    public function training()
    {
        return $this->render('site/cours.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }
    /**
     * @Route("/team", name="team")
     */
    public function team()
    {
        return $this->render('site/team.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/event", name="event")
     */
    public function event()
    {
        return $this->render('site/event.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/subscribe", name="subscibe")
     */
    public function subscribe()
    {
        return $this->render('site/subscribe.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('site/admin.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/admin/gestiondescours", name="gestiondescours")
     */
    public function gestioncours()
    {
        return $this->render('site/admingestiondescours.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }
    /**
     * @Route("/admin/gestiondescoachs", name="gestiondescoach")
     */
    public function gestioncoach ()
    {
        return $this->render('site/admingestiondescoachs.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

}
