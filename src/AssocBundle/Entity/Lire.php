<?php

namespace AssocBundle\Entity;

use AppBundle\Entity\Membre;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lire
 *
 * @ORM\Table(name="lire")
 * @ORM\Entity(repositoryClass="AssocBundle\Repository\LireRepository")
 */
class Lire
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Membre")
     * @ORM\JoinColumn(name="membre_id",referencedColumnName="id",onDelete="CASCADE")
     * @var [type]
     */
    private $membre;

    /**
     * @ORM\ManyToOne(targetEntity="Abonne")
     * @ORM\JoinColumn(name="abonne_id",referencedColumnName="id",onDelete="CASCADE")
     * @var [type]
     */
    private $abonne;

    /**
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumn(name="article_id",referencedColumnName="id",onDelete="CASCADE")
     * @var [type]
     */
    private $article;

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
     * @param \AppBundle\Entity\Membre $membre
     *
     * @return Lire
     */
    public function setMembre(Membre $membre)
    {
        $this->membre = $membre;

        return $this;
    }

    /**
     * Get membre
     *
     * @return \AppBundle\Entity\Membre
     */
    public function getMembre()
    {
        return $this->membre;
    }

    /**
     * Set abonne
     *
     * @param \AssocBundle\Entity\Abonne $abonne
     *
     * @return Lire
     */
    public function setAbonne(\AssocBundle\Entity\Abonne $abonne = null)
    {
        $this->abonne = $abonne;

        return $this;
    }

    /**
     * Get abonne
     *
     * @return \AssocBundle\Entity\Abonne
     */
    public function getAbonne()
    {
        return $this->abonne;
    }

    /**
     * Set article
     *
     * @param \AssocBundle\Entity\Article $article
     *
     * @return Lire
     */
    public function setArticle(\AssocBundle\Entity\Article $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \AssocBundle\Entity\Article
     */
    public function getArticle()
    {
        return $this->article;
    }
}
