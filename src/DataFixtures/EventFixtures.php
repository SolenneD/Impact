<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 18/03/2018
 * Time: 16:40
 */

namespace App\DataFixtures;


use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\DBAL\Schema\Constraint;

class EventFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
        $i = 1;
        while($i < 10){
            $event = new Event();
            $event->setTitle("Event n°".$i);
            $event->setDay(new \DateTime('06/04/2018'));
            $event->setHour(new \DateTime('06/04/2018'));
            $event->setDescription('Description de l\'Event n°'.$i);
            $event->setisCanceled('0');

            $manager->persist($event);
            $i++;
        }
        $manager->flush();
    }
}