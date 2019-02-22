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
 *      "get"={"method"="GET","normalization_context"={"groups"="user:get"}},
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
     * @Groups({"user:get"})
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
     * @ORM\Column(type="string",length=45,nullable=true)
     * @Groups({"user:get"})
     * @var string
     */
    private $realname;
    /**
     * @ORM\Column(type="date",nullable=true)
     * @Groups({"user:get"})
     */
    private $birthdate;
    /**
     * @ORM\Column(type="integer",nullable=true)
     * @Groups({"user:get"})
     * @var int
     */
    private $height;
    /**
     * @ORM\Column(type="string",nullable=true)
     * @Groups({"user:get"})
     * @var string
     */
    private $gender;
    /**
     * @ORM\Column(type="float",nullable=true)
     * @Groups({"user:get"})
     * @var float
     */
    private $imc;
    /**
     * @ORM\OneToMany(targetEntity="Weight",mappedBy="user")
     * @ORM\JoinTable()
     * @Groups({"user:get"})
     * @var Collection
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
     * @param $isActive
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

    /**
     * @return string|null
     */
    public function getRealname(): ?string
    {
        return $this->realname;
    }

    /**
     * @param string $realname
     * @return User
     */
    public function setRealname(string $realname): self
    {
        $this->realname = $realname;
        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param $birthdate
     * @return User
     */
    public function setBirthdate($birthdate): self
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return User
     */
    public function setHeight(int $height): self
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return User
     */
    public function setGender(string $gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getImc(): ?float
    {
        return $this->imc;
    }

    /**
     * @param float $imc
     * @return User
     */
    public function setImc(float $imc): self
    {
        $this->imc = $imc;
        return $this;
    }

    /**
     * @return Collection|null
     */
    public function getWeights(): Collection
    {
        return $this->weights;
    }

    /**
     * @param Collection $weights
     * @return User
     */
    public function setWeights(Collection $weights): self
    {
        $this->weights = $weights;
        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getMeals()
    {
        return $this->meals;
    }

    /**
     * @param $meals
     * @return User
     */
    public function setMeals($meals): self
    {
        $this->meals = $meals;
        return $this;
    }




}