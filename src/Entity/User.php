<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 06/02/2019
 * Time: 18:50
 */

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

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
 *     name="user"
 * )
 * @ORM\Entity()
 * Class User
 * @package App\Entity
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", options={"unsigned": true})
     * @var int
     */
    private $id;
    /**
     * @ORM\Column(type="string",length=45,nullable=false)
     * @var string
     */
    private $name;
    /**
     * @ORM\Column(type="string",length=100,nullable=false)
     * @var string
     */
    private $firstname;
    /**
     * @ORM\Column(type="integer",length=3,nullable=false)
     * @var int
     */
    private $age;
    /**
     * @ORM\Column(type="string",length=45,nullable=false)
     * @var string
     */
    private $password;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return User
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return User
     */
    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }



}