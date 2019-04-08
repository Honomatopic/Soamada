<?php

namespace AssocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abonner
 *
 * @ORM\Table(name="abonner")
 * @ORM\Entity(repositoryClass="AssocBundle\Repository\AbonnerRepository")
 */
class Abonner
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
     * @ORM\ManyToOne(targetEntity="Membre")
     * @ORM\JoinColumn(name="membre_id", referencedColumnName="id", onDelete="CASCADE")
     * @ORM\Column(name="membre", type="integer", unique=true)
     */
    private $membre;

    /**
     * @var int
     * 
     * @ORM\ManyToOne(targetEntity="Lettre")
     * @ORM\JoinColumn(name="lettre_id", referencedColumnName="id", onDelete="CASCADE")
     * @ORM\Column(name="lettre", type="integer", unique=true)
     */
    private $lettre;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set membre
     *
     * @param integer $membre
     *
     * @return Abonner
     */
    public function setMembre($membre)
    {
        $this->membre = $membre;

        return $this;
    }

    /**
     * Get membre
     *
     * @return int
     */
    public function getMembre()
    {
        return $this->membre;
    }

    /**
     * Set lettre
     *
     * @param integer $lettre
     *
     * @return Abonner
     */
    public function setLettre($lettre)
    {
        $this->lettre = $lettre;

        return $this;
    }

    /**
     * Get lettre
     *
     * @return int
     */
    public function getLettre()
    {
        return $this->lettre;
    }
}
