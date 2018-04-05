<?php
/**
 * Created by PhpStorm.
 * User: monic
 * Date: 18/03/2018
 * Time: 16:40
 */

namespace App\DataFixtures;


use App\Entity\Coach;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\DBAL\Schema\Constraint;

class CoachFixtures extends Fixture
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
        while($i < 7){
            $coach = new Coach();
            $coach->setName("Nom de famille du coach n°".$i);
            $coach->setLastname("Prénom du coach n°".$i);
            $coach->setEmail("email".$i."@mail.fr");
            $coach->setBio("Description du coach n°".$i);
            $coach->setImage("Image".$i);


            $manager->persist($coach);
            $i++;
        }
        $manager->flush();
    }
}