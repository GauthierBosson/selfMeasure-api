<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 06/02/2019
 * Time: 18:50
 */

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     itemOperations={
 *      "get",
 *       "put",
 *       "delete"
 *     },
 *     collectionOperations={
 *     "get",
 *     "post",
 *     "register"={"route_name"="register_route","normalization_context"={"groups"="user:edit"}}
 *     }
 * )
 * @ORM\Table(
 *     name="user",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint(name="UNIQ_8D93D649F85E0677", columns={"username"})
 *     }
 * )
 * @ORM\Entity()
 * @ORM\EntityListeners("App\EventListener\UserListener")
 * Class User
 * @UniqueEntity(
 *     fields={"username"},
 *     message="L'adresse email existe déjà",
 * )
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
     * @Assert\NotBlank(
     *     message="Un identifiant est obligatoire"
     * )
     * @Groups({"user:edit"})
     * @var string
     */
    private $username;
    /**
     * @ORM\Column(type="string",length=100,nullable=false)
     * @Assert\NotBlank(
     *     message="Un password est obligatoire"
     * )
     * @var string
     */
    private $password;
    /**
     * @ORM\Column(name="is_active", type="boolean")
     * @var integer
     */
    private $isActive = true;
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
     * @var Collection
     */
    protected $mealAdvices;

    public function __construct($username)
    {
        $this->username = $username;
        $this->mealAdvices = new ArrayCollection();

    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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

    public function getSalt(): string
    {
        return uniqid('', true);
    }

    /**
     * @return mixed
     */
    public function getisActive()
    {
        return $this->isActive;
    }

    /**
     * @param ${SCALAR_TYPE_HINT} $isActive
     * @return User
     */
    public function setIsActive($isActive): self
    {
        $this->isActive = $isActive;
        return $this;
    }


    public function getRoles(): array
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials(): void
    {
    }

    /**
     * @return Collection
     */
    public function getMealAdvices(): Collection
    {
        return $this->mealAdvices;
    }

    /**
     * @param MealAdvice $mealAdvice
     * @return $this
     */
    public function addMealAdvice(MealAdvice $mealAdvice): self
    {
        $this->mealAdvices->add($mealAdvice);
        return $this;

    }

    public function removeMealAdvice(MealAdvice $mealAdvice): self
    {
        if ($this->mealAdvices->contains($mealAdvice)) {
            $this->mealAdvices->removeElement($mealAdvice);
        }

        return $this;
    }
}