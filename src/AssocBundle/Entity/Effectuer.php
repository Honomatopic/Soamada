<?php

namespace AssocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Effectuer
 *
 * @ORM\Table(name="effectuer")
 * @ORM\Entity(repositoryClass="AssocBundle\Repository\EffectuerRepository")
 */
class Effectuer
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Membre")
     * @ORM\JoinColumn(name="membre_id",referencedColumnName="id",onDelete="CASCADE")
     * @ORM\Column(name="membre", type="integer", unique=true)
     */
    private $membre;

    /**
     * @var int
     * 
     * @ORM\ManyToOne(targetEntity="Don")
     * @ORM\JoinColumn(name="don_id",referencedColumnName="id",onDelete="CASCADE")
     * @ORM\Column(name="don", type="integer", unique=true)
     */
    private $don;


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
     * @return Effectuer
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
     * Set don
     *
     * @param integer $don
     *
     * @return Effectuer
     */
    public function setDon($don)
    {
        $this->don = $don;

        return $this;
    }

    /**
     * Get don
     *
     * @return int
     */
    public function getDon()
    {
        return $this->don;
    }
}
