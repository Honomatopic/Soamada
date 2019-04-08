<?php

namespace AssocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lettre
 *
 * @ORM\Table(name="lettre")
 * @ORM\Entity(repositoryClass="AssocBundle\Repository\LettreRepository")
 */
class Lettre
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
     * @return Lettre
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
}
