<?php
/**
 * Created by PhpStorm.
 * User: B3 DEV
 * Date: 15/03/2018
 * Time: 12:18
 */

namespace App\Entity;


class Objectif
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
    protected $nom_objectif;

    /**
     * @ManyToMany(targetEntity="Utilisateurs")
     * @JoinTable(name="utilisateur_objectif",
     *      joinColumns={@JoinColumn(name="utilisateur_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="objectif_id", referencedColumnName="id", unique=true)}
     *      )
     */
    protected $utilisateur;


}