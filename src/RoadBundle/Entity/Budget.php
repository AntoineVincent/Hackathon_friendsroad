<?php

namespace RoadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Budget
 *
 * @ORM\Table(name="budget")
 * @ORM\Entity(repositoryClass="RoadBundle\Repository\BudgetRepository")
 */
class Budget
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="essence", type="integer", nullable=true)
     */
    private $essence;
    

    /**
     * @var int
     *
     * @ORM\Column(name="user", type="integer", nullable=true)
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\Column(name="bouffe", type="integer", nullable=true)
     */
    private $bouffe;

    /**
     * @var int
     *
     * @ORM\Column(name="trajet", type="integer", nullable=true)
     */
    private $trajet;

    /**
     * @var int
     *
     * @ORM\Column(name="sortie", type="integer", nullable=true)
     */
    private $sortie;

    /**
     * @var int
     *
     * @ORM\Column(name="idgroupe", type="integer", nullable=true)
     */
    private $idgroupe;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set essence
     *
     * @param integer $essence
     * @return Budget
     */
    public function setEssence($essence)
    {
        $this->essence = $essence;

        return $this;
    }
    
    

    /**
     * Get essence
     *
     * @return integer 
     */
    public function getEssence()
    {
        return $this->essence;
    }

    /**
     * Set user
     *
     * @param integer $user
     * @return Budget
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set bouffe
     *
     * @param integer $bouffe
     * @return Budget
     */
    public function setBouffe($bouffe)
    {
        $this->bouffe = $bouffe;

        return $this;
    }

    /**
     * Get bouffe
     *
     * @return integer 
     */
    public function getBouffe()
    {
        return $this->bouffe;
    }

    /**
     * Set trajet
     *
     * @param integer $trajet
     * @return Budget
     */
    public function setTrajet($trajet)
    {
        $this->trajet = $trajet;

        return $this;
    }

    /**
     * Get trajet
     *
     * @return integer 
     */
    public function getTrajet()
    {
        return $this->trajet;
    }

    /**
     * Set sortie
     *
     * @param integer $sortie
     * @return Budget
     */
    public function setSortie($sortie)
    {
        $this->sortie = $sortie;

        return $this;
    }

    /**
     * Get sortie
     *
     * @return integer 
     */
    public function getSortie()
    {
        return $this->sortie;
    }

    /**
     * Set idgroupe
     *
     * @param integer $idgroupe
     * @return Budget
     */
    public function setIdgroupe($idgroupe)
    {
        $this->idgroupe = $idgroupe;

        return $this;
    }

    /**
     * Get idgroupe
     *
     * @return integer 
     */
    public function getIdgroupe()
    {
        return $this->idgroupe;
    }
}
