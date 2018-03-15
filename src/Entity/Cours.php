<?php
/**
 * Created by PhpStorm.
 * User: B3 DEV
 * Date: 15/03/2018
 * Time: 12:00
 */

namespace App\Entity;


class cours
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
     * @ORM\Column(type="date")
     */
    protected $jour;

    /**
     * @ORM\Column(type="time")
     */
    protected $heures;

    /**
     * @ORM\Column(type="time")
     */
    protected $duree;

    /**
     * @ORM\Column(type="time")
     */
    protected $intensite;

    /**
     * @ORM\ManyToOne(targetEntity="Coach", inversedBy="cours")
     * @ORM\JoinColumn(name="coach_id", referencedColumnName="id")
     */
    protected $coach;
    /**
     * @ManyToMany(targetEntity="Utilisateurs")
     * @JoinTable(name="utilisateur_cours",
     *      joinColumns={@JoinColumn(name="utilisateur_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="cours_id", referencedColumnName="id", unique=true)}
     *      )
     */
    protected $utilisateur;
}