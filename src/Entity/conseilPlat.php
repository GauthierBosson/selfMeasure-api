<?php
/**
 * Created by PhpStorm.
 * User: Romain
 * Date: 08/02/2019
 * Time: 11:37
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;



class ConseilPlat
{

    /**
     * @ManyToMany(targetEntity="ConseilPlat")
     * @JoinTable(
     *     name="plat_has_user",
     *     joinColumns={
     *         @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *          @ORM\JoinColumn(name="conseilRepas_id",referencedColumnName="id")
     *     }
     * )

    /**
     *@ORM\OneToMany(targetEntity="App\Entity\proposition", mappedBy="conseilPlat")

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getNbrCalories()
    {
        return $this->nbrCalories;
    }

    /**
     * @param mixed $nbrCalories
     */
    public function setNbrCalories($nbrCalories): void
    {
        $this->nbrCalories = $nbrCalories;
    }


    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @OORM\Column(name="nom", type="text", length=255)
     */
    protected $nom;


    /**
     * @ORM\Column(name="nbrCalories", type="integer")
     */
    protected $nbrCalories;


    /**
     * @ORM
     */

}