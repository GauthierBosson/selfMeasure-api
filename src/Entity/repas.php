<?php
/**
 * Created by PhpStorm.
 * User: Romain
 * Date: 08/02/2019
 * Time: 11:24
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;




class repas
{

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\user", inversedBy="repas")
     */


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
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * @param mixed $calories
     */
    public function setCalories($calories): void
    {
        $this->calories = $calories;
    }

    /**
     * @return mixed
     */
    public function getAliment()
    {
        return $this->aliment;
    }

    /**
     * @param mixed $aliment
     */
    public function setAliment($aliment): void
    {
        $this->aliment = $aliment;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getMomentJournee()
    {
        return $this->momentJournee;
    }

    /**
     * @param mixed $momentJournee
     */
    public function setMomentJournee($momentJournee): void
    {
        $this->momentJournee = $momentJournee;
    }


    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(name="calories", type="integer")
     */
    protected $calories;


    /**
     * @ORM\Column(name="aliment", type="text", length=255)
     */
    protected $aliment;

    /**
     * @ORM\Column(name="date", type="date")
     */
    protected $date;


    /**
     * @ORM\Column(name="momentJournee", type="text", length=255)
     */
    protected $momentJournee;


}