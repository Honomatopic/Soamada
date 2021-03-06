<?php

namespace AssocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abonne
 *
 * @ORM\Table(name="abonne")
 * @ORM\Entity(repositoryClass="AssocBundle\Repository\AbonneRepository")
 */
class Abonne
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
     * @ORM\Column(name="emailabonne", type="string", length=255, unique=true)
     */
    private $emailabonne;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Membre")
     * @ORM\JoinColumn(name="membre_id", referencedColumnName="id", onDelete="CASCADE")
     * @ORM\Column(name="Membre_id",nullable=true,type="integer")
     */
    private $membre;

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
     * Set emailabonne
     *
     * @param string $emailabonne
     *
     * @return Abonne
     */
    public function setEmailabonne($emailabonne)
    {
        $this->emailabonne = $emailabonne;

        return $this;
    }

    /**
     * Get emailabonne
     *
     * @return string
     */
    public function getEmailabonne()
    {
        return $this->emailabonne;
    }


    /**
     * Set membre
     *
     * @param integer $membre
     */
    public function setMembre($membre)
    {
        $this->membre = $membre;

        return $this;
    }

    /**
     * Get membre
     * 
     *  @return integer
     */
    public function getMembre()
    {
        return $this->membre;
    }
}
