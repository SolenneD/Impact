<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrainingRepository")
 */
class Training
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="date")
     */
    protected $day;

    /**
     * @ORM\Column(type="time")
     */
    protected $hour;

    /**
     * @ORM\Column(type="string")
     */
    protected $periode;

    /**
     * @ORM\Column(type="integer")
     */
    protected $intensite;

    /**
     * @ORM\ManyToOne(targetEntity="Coach", inversedBy="training")
     */
    protected $coach;
}
