<?php
/**
 * Created by PhpStorm.
 * User: monic
 * Date: 18/03/2018
 * Time: 15:36
 */

namespace App\DataFixtures;


use App\Entity\Training;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\DBAL\Schema\Constraint;
use Symfony\Component\Validator\Constraints\DateTime;

class TrainingFixtures extends Fixture
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
        while($i < 11){
            $training = new Training();
            $training->setTitle("Cours n°".$i);
            $training->setDay(new \DateTime('06/04/2018'));
            $training->setHour(new \DateTime('06/04/2018'));
            $training->setPeriode($i*2);
            $training->setIntensite($i%2);
            $training->setisCanceled('0');

            $manager->persist($training);
            $i++;
        }
        $manager->flush();
    }
}