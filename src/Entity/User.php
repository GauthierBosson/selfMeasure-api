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
use Symfony\Component\Security\Core\User\UserInterface;

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
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", options={"unsigned": true})
     * @var int
     */
    private $id;
    /**
     * @ORM\Column(type="string",length=100,nullable=false,unique=true)
     * @var string
     */
    private $username;
    /**
     * @ORM\Column(type="string",length=100,nullable=false)
     * @var string
     */
    private $password;
    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
    /**
     * @ORM\OneToMany(targetEntity="Weight",mappedBy="user")
     */
    protected $weights;
    /**
     * @ORM\OneToMany(targetEntity="Meal",mappedBy="user")
     */
    protected $meals;
    /**
     * @ORM\ManyToMany(targetEntity="MealAdvice",inversedBy="users")
     * @ORM\JoinTable(name="users_mealadvices")
     */
    protected $mealAdvices;

    public function __construct($username)
    {
        $this->isActive = true;
        $this->username = $username;
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
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;
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

    public function getSalt(): ?string
    {
        return null;
    }

    public function getRoles(): array
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials(): void
    {
    }
}