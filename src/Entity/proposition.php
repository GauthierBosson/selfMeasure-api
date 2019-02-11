<?php
/**
 * Created by PhpStorm.
 * User: Romain
 * Date: 08/02/2019
 * Time: 11:26
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;


class proposition
{

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\conseilPlat", inversedBy="proposition")
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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(name="date", type="date")
     */
    protected $date;


}