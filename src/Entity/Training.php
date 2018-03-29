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
     * @ORM\Column(type="boolean", options={"default":false})
     */
    protected $isCanceled;

    /**
     * @ORM\ManyToOne(targetEntity="Coach", inversedBy="training")
     */
    protected $coach;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param mixed $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return mixed
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * @param mixed $hour
     */
    public function setHour($hour)
    {
        $this->hour = $hour;
    }

    /**
     * @return mixed
     */
    public function getPeriode()
    {
        return $this->periode;
    }

    /**
     * @param mixed $periode
     */
    public function setPeriode($periode)
    {
        $this->periode = $periode;
    }

    /**
     * @return mixed
     */
    public function getIntensite()
    {
        return $this->intensite;
    }

    /**
     * @param mixed $intensite
     */
    public function setIntensite($intensite)
    {
        $this->intensite = $intensite;
    }

    /**
     * @return mixed
     */
    public function getisCanceled()
    {
        return $this->isCanceled;
    }

    /**
     * @param mixed $isCanceled
     */
    public function setIsCanceled($isCanceled)
    {
        $this->isCanceled = $isCanceled;
    }

    /**
     * @return mixed
     */
    public function getCoach()
    {
        return $this->coach;
    }

    /**
     * @param mixed $coach
     */
    public function setCoach($coach)
    {
        $this->coach = $coach;
    }

    public function __toString() {
        return $this->title;
    }
}
