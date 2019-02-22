<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 17/02/2019
 * Time: 17:31
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(
 *     name="suggestion"
 * )
 * @ORM\Entity()
 * Class Suggestion
 * @package App\Entity
 */
class Suggestion
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer",options={"unsigned": false})
     * @var int
     */
    private $id;
    /**
     * @ORM\Column(type="date",nullable=false)
     */
    private $date;
    /**
     * @ORM\ManyToOne(targetEntity="MealAdvice",inversedBy="suggestions")
     */
    protected $mealAdvice;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Suggestion
     */
    public function setId(int $id): self
    {
        $this->id = $id;
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
     * @return Suggestion
     */
    public function setDate($date): self
    {
        $this->date = $date;
        return $this;
    }

}