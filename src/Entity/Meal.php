<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 17/02/2019
 * Time: 17:01
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(
 *     name="meal"
 * )
 * @ORM\Entity()
 * Class Meal
 * @package App\Entity
 */
class Meal
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer",options={"unsigned": false})
     * @var int
     */
    private $id;
    /**
     * @ORM\Column(type="string",nullable=false,length=150)
     * @var string
     */
    private $aliment;
    /**
     * @ORM\Column(type="date",nullable=false)
     */
    private $date;
    /**
     * @ORM\Column(type="string",nullable=false,length=45)
     */
    private $dayMoment;
    /**
     * @ORM\ManyToOne(targetEntity="User",inversedBy="meals")
     */
    protected $user;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return Meal
     */
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getAliment(): string
    {
        return $this->aliment;
    }

    /**
     * @param string $aliment
     * @return Meal
     */
    public function setAliment(string $aliment): self
    {
        $this->aliment = $aliment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param $date
     * @return Meal
     */
    public function setDate($date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDayMoment()
    {
        return $this->dayMoment;
    }

    /**
     * @param $dayMoment
     * @return Meal
     */
    public function setDayMoment($dayMoment): self
    {
        $this->dayMoment = $dayMoment;
        return $this;
    }

}