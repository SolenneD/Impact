<?php
/**
 * Created by PhpStorm.
 * User: monic
 * Date: 29/03/2018
 * Time: 11:06
 */

namespace App\Event;


use App\Entity\Event;
use JavierEguiluz\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class MailEvent implements EventSubscriberInterface
{
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public static function getSubscribedEvents()
    {
        return [
          EasyAdminEvents::POST_UPDATE => 'onPostUpdate'
        ];
    }

    public function onPostUpdate(GenericEvent $event) {

        $entity = $event->getSubject();

            if ($entity instanceof Event) {
                // mail d'annulation
                $message = (new \Swift_Message('Hello Email'))
                    ->setFrom('meride.monica@gmail.com')
                    ->setTo('belabesmohammed@gmail.com')
                    ->setBody(
                        'test'
                    )
                ;

                $this->mailer->send($message);
                //dump($message);die;
            }
    }
}