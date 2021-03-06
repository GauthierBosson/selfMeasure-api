<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 17/02/2019
 * Time: 16:49
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     itemOperations={
 *      "get",
 *       "put",
 *       "delete"
 *     },
 *     collectionOperations={
 *     "get",
 *     "post"
 *     }
 * )
 * @ORM\Table(
 *     name="weight"
 * )
 * @ORM\Entity()
 * Class Weight
 * @package App\Entity
 */
class Weight
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer",options={"unsigned": true})
     * @Groups("user:get")
     * @var int
     */
    private $id;
    /**
     * @ORM\Column(type="date",nullable=false)
     * @Groups("user:get")
     */
    private $date;
    /**
     * @ORM\Column(type="integer",nullable=false)
     * @Groups("user:get")
     * @var int
     */
    private $value;
    /**
     * @ORM\ManyToOne(targetEntity="User",inversedBy="weights")
     * @Groups("user:get")
     */
    protected $user;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param $user
     * @return Weight
     */
    public function setUser($user): self
    {
        $this->user = $user;
        return $this;
    }



    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Weight
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
     * @return Weight
     */
    public function setDate($date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return Weight
     */
    public function setValue(int $value): self
    {
        $this->value = $value;
        return $this;
    }

}