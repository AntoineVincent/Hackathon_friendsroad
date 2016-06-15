<?php

namespace RoadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itineraire
 *
 * @ORM\Table(name="itineraire")
 * @ORM\Entity(repositoryClass="RoadBundle\Repository\ItineraireRepository")
 */
class Itineraire
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
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=30, nullable=true)
     */
    private $ville;

    /**
     * @var int
     *
     * @ORM\Column(name="coordonnee", type="integer", nullable=true)
     */
    private $coordonnee;

    /**
     * @var int
     *
     * @ORM\Column(name="trace", type="integer", nullable=true)
     */
    private $trace;

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
     * Set ville
     *
     * @param string $ville
     * @return Itineraire
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set coordonnee
     *
     * @param integer $coordonnee
     * @return Itineraire
     */
    public function setCoordonnee($coordonnee)
    {
        $this->coordonnee = $coordonnee;

        return $this;
    }

    /**
     * Get coordonnee
     *
     * @return integer 
     */
    public function getCoordonnee()
    {
        return $this->coordonnee;
    }

    /**
     * Set trace
     *
     * @param integer $trace
     * @return Itineraire
     */
    public function setTrace($trace)
    {
        $this->trace = $trace;

        return $this;
    }

    /**
     * Get trace
     *
     * @return integer 
     */
    public function getTrace()
    {
        return $this->trace;
    }

    /**
     * Set idgroupe
     *
     * @param integer $idgroupe
     * @return Itineraire
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
