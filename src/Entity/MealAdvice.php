<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 17/02/2019
 * Time: 17:24
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(
 *     name="mealAdvice"
 * )
 * @ORM\Entity()
 * Class MealAdvice
 * @package App\Entity
 */
class MealAdvice
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
    private $mealName;
    /**
     * @ORM\Column(type="integer",nullable=false)
     * @var int
     */
    private $caloryNumbers;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return MealAdvice
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getMealName(): string
    {
        return $this->mealName;
    }

    /**
     * @param string $mealName
     * @return MealAdvice
     */
    public function setMealName(string $mealName): self
    {
        $this->mealName = $mealName;
        return $this;
    }

    /**
     * @return int
     */
    public function getCaloryNumbers(): int
    {
        return $this->caloryNumbers;
    }

    /**
     * @param int $caloryNumbers
     * @return MealAdvice
     */
    public function setCaloryNumbers(int $caloryNumbers): self
    {
        $this->caloryNumbers = $caloryNumbers;
        return $this;
    }


}