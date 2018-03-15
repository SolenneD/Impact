<?php
/**
 * Created by PhpStorm.
 * User: B3 DEV
 * Date: 15/03/2018
 * Time: 13:38
 */

namespace App\Entity;


class Admin
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\nom
     * @ORM\Column(type="varchar")
     */
    protected $nom;

    /**
     * @ORM\Column(type="varchar")
     */
    protected $prenom;

    /**
     * @ORM\Column(type="text")
     */
    protected $mail;

    /**
     * @ORM\Column(type="text")
     */
    protected $mdp;
}