<?php
/**
 * Created by PhpStorm.
 * User: baws
 * Date: 16/03/2018
 * Time: 2:07 PM
 */

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $i = 1;

        while ($i <= 4) {
            $post = new Users();
            $post->setName("Prenom" . $i);
            $post->setLastname("Nom" . $i);
            $post->setEmail("Email" . $i);
            $post->setPassword("Mot de passe" . $i);

            $manager->persist($post);
            $i++;
        }

        $manager->flush();
    }
}