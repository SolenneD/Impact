<?php
/**
 * Created by PhpStorm.
 * User: monic
 * Date: 29/03/2018
 * Time: 11:06
 */

namespace App\Event;


use App\Entity\Event;
use App\Entity\Training;
use App\Entity\Users;
use App\Repository\UsersRepository;
use JavierEguiluz\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class MailEvent implements EventSubscriberInterface
{
    private $mailer;
    private $usersRepository;

    public function __construct(\Swift_Mailer $mailer, UsersRepository $usersRepository, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->usersRepository = $usersRepository;
        $this->templating = $templating;
    }

    public static function getSubscribedEvents()
    {
        return [
          EasyAdminEvents::POST_UPDATE => 'onPostUpdate'
        ];
    }

    public function onPostUpdate(GenericEvent $event) {

        $entity = $event->getSubject();
        $idEntity = $entity->getId();

        if ($entity instanceof Event) {
            $users = $this->usersRepository->findByEvent($idEntity);
            $usersEmail = [];
            foreach($users as $user) {
                $usersEmail[] = $user->getEmail();
            }
            // mail d'annulation
            try {
                $message = (new \Swift_Message('Hello Email'))
                    ->setFrom('meride.monica@gmail.com')
                    ->setTo($usersEmail)
                    ->setBody(
                        $this->templating->render(
                            'site/email_event.html.twig',
                            array('event' => $entity)
                        ),
                        'text/html'
                    );
            } catch (\Twig_Error_Loader $e) {
            } catch (\Twig_Error_Runtime $e) {
            } catch (\Twig_Error_Syntax $e) {
            }

            $this->mailer->send($message);
            //dump($message);die;
        }elseif ($entity instanceof Training){
            $users = $this->usersRepository->findByTraining($idEntity);
            $usersEmail = [];
            foreach($users as $user) {
                $usersEmail[] = $user->getEmail();
            }
            // mail d'annulation
            try {
                $message = (new \Swift_Message('Hello Email'))
                    ->setFrom('meride.monica@gmail.com')
                    ->setTo($usersEmail)
                    ->setBody(
                        $this->templating->render(
                            'site/email_training.html.twig',
                            array('event' => $entity)
                        ),
                        'text/html'
                    );
            } catch (\Twig_Error_Loader $e) {
            } catch (\Twig_Error_Runtime $e) {
            } catch (\Twig_Error_Syntax $e) {
            }

            $this->mailer->send($message);
        }
    }
}