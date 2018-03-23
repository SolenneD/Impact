<?php
/**
 * Created by PhpStorm.
 * User: monic
 * Date: 18/03/2018
 * Time: 15:36
 */

namespace App\DataFixtures;


use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
        $admin = new Users();
        $admin->setUsername('admin');
        $admin->setLastname('admin');
        $admin->setPassword($this->encoder->encodePassword($admin, 'admin'));
        $admin->setEmail('admin@gmail.com');
        $admin->setIsAdmin(true);
        $manager->persist($admin);

        $manager->flush();
    }
}