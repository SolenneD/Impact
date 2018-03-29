<?php

namespace App\Controller;

use App\Entity\Coach;
use App\Entity\Event;
use App\Entity\Training;
use App\Form\CanceledTrainingType;
use App\Form\CoachType;
use App\Form\EventType;
use App\Form\TrainingType;
use App\Repository\CoachRepository;
use App\Repository\EventRepository;
use App\Repository\TrainingRepository;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

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
    public function training(TrainingRepository $trainingRepository, CoachRepository $coachRepository)
    {
        $trainings = $trainingRepository->findAll();

        return $this->render('site/cours.html.twig', [
            'trainings'=>$trainings,
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/reservation/{idTraining}", name="reservation")
     */
    public function reservation($idTraining, TrainingRepository $trainingRepository)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $training = $entityManager->getRepository(Training::class)->find($idTraining);
        $user= $this->getUser();
        return $this->render('site/reservation.html.twig', [
            'training'=>$training,
            'user'=>$user,
            'controller_name' => 'SiteController',
        ]);
    }

    /**s
     * @Route("/team", name="team")
     */
    public function team(CoachRepository $coachRepository)
    {
        $coachs = $coachRepository->findAll();
        return $this->render('site/team.html.twig', [
            'coachs' =>$coachs,
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/event", name="event")
     */
    public function event(EventRepository $eventRepository)
    {
        $events = $eventRepository->findAll();
        return $this->render('site/event.html.twig', [
            'events' => $events,
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/subscribe", name="subscribe")
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
        if (false === $this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException();
        }
        return $this->render('site/admin.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/admin/gestiondescours", name="gestiondescours")
     */
    public function gestioncours(Request $request, TrainingRepository $trainingRepository)
    {
        $trainings = $trainingRepository->findAll();

        $training = new Training();
        $form = $this->createForm(TrainingType::class, $training);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){ //si form envoyer et valide
            $training->setIsCanceled(0);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($training);
            $entityManager->flush(); //envoie dans la base de donnée

            return $this->redirectToRoute('training');
        }

        return $this->render('site/admingestiondescours.html.twig', [
            'form' => $form->createView(),
            'trainings'=>$trainings,
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/admin/gestiondescours/{id}", name="updatecours")
     */
    public function updateCours($id, \Swift_Mailer $mailer)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $training = $entityManager->getRepository(Training::class)->find($id);

        if (!$training) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

//        if($training->getIsCanceled() == 0){} //vérifier si le isCanceled est à 0
        $training->setIsCanceled(1);
        $entityManager->flush();

        // mail d'annulation
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('meride.monica@gmail.com')
            ->setTo('monica.meride@outlook.fr')
            ->setBody(
               'test'
            )
        ;

        $mailer->send($message);

        return $this->redirectToRoute('gestiondescours');
    }

    /**
     * @Route("/admin/gestiondescoachs", name="gestiondescoach")
     */
    public function gestioncoach (Request $request)
    {
        $coach = new Coach();
        $form = $this->createForm(CoachType::class, $coach);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){ //si form envoyer et valide
            /**
             * @var UploadedFile $file
             */
            $file=$coach->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('image_directory'),
                $fileName
            );

            $coach->setImage($fileName);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($coach);
            $entityManager->flush(); //envoie dans la base de donnée

            return $this->redirectToRoute('team');
        }

        return $this->render('site/admingestiondescoachs.html.twig', array(
            'form' => $form->createView(),
            'controller_name' => 'SiteController',
        ));
    }

    /**
     * @Route("/admin/gestiondesevenements", name="gestiondesevenements")
     */
    public function gestionevent(Request $request, EventRepository $eventRepository)
    {
        $events = $eventRepository->findAll();
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $event->setIsCanceled(0);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($event);
            $entityManager->flush();

            return $this->redirectToRoute('event');
        }

        return $this->render('site/admingestiondesevenement.html.twig', [
            'form' => $form->createView(),
            'events' => $events,
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/admin/gestiondesevenements/{id}", name="updateevent")
     */
    public function updateEvent($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $training = $entityManager->getRepository(Training::class)->find($id);

        if (!$training) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

//        if($training->getIsCanceled() == 0){} //vérifier si le isCanceled est à 0
        $training->setIsCanceled(1);
        $entityManager->flush();

        return $this->redirectToRoute('gestiondesevenements');
    }

}
