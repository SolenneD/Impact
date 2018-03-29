<?php
/**
 * Created by PhpStorm.
 * User: baws
 * Date: 16/03/2018
 * Time: 2:07 PM
 */

namespace App\DataFixtures;

use App\Entity\Training;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class PlanningFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $i = 1;

        while ($i <= 6) {
            $tra = new Training();
            $tra->setTitle("Cours" . $i);
            $tra->setDay(new \DateTime('06/04/2018'));
            $tra->setHours(new \DateTime('06/04/2018'));
            $tra->setDuration("Durée" . $i);
            $tra->setIntensite("Intensité" . $i);

            $manager->persist($tra);
            $i++;
        }

        $manager->flush();
    }
}