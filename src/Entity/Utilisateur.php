<?php
/**
 * Created by PhpStorm.
 * User: B3 DEV
 * Date: 15/03/2018
 * Time: 12:25
 */

namespace App\Entity;


class Utilisateur
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
     * @ORM\Column(type="text")
     */
    protected $mdp;
    /**
     * @ManyToMany(targetEntity="Objectif")
     * @JoinTable(name="utilisateur_objectif",
     *      joinColumns={@JoinColumn(name="utilisateur_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="objectif_id", referencedColumnName="id", unique=true)}
     *      )
     */
    protected $objectif;

    /**
     * @ManyToMany(targetEntity="Cours")
     * @JoinTable(name="utilisateur_cours",
     *      joinColumns={@JoinColumn(name="utilisateur_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="cours_id", referencedColumnName="id", unique=true)}
     *      )
     */
    protected $cours;


}