<?php
/**
 * Created by PhpStorm.
 * User: B3 DEV
 * Date: 15/03/2018
 * Time: 11:56
 */

namespace App\Entity;


class coach
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="varchar")
     */
    protected $nom;

    /**
     * @ORM\Column(type="varchar")
     */
    protected $name;

    /**
     * @ORM\Column(type="text")
     */
    protected $mail;

    /**
     * @ORM\OneToMany(targetEntity="Cours", mappedBy="coach")
     */
    protected $cours;


}