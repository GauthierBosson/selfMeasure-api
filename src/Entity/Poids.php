<?php
/**
 * Created by PhpStorm.
 * User: Romain
 * Date: 08/02/2019
 * Time: 11:36
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;


class poids
{

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\user", inversedBy="Poids")
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
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * @param mixed $valeur
     */
    public function setValeur($valeur): void
    {
        $this->valeur = $valeur;
    }

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(name="date", type="date")
     */
    protected $date;


    /**
     * @ORM\Column(name="valeur", type="integer")
     */
    protected $valeur;
}

