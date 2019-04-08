<?php

namespace AssocBundle\Entity;

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
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id", onDelete="CASCADE")
     * @ORM\Column(name="article", type="integer", unique=true)
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
     * @param integer $membre
     *
     * @return Lire
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
     * Set article
     *
     * @param integer $article
     *
     * @return Lire
     */
    public function setArticle($article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return int
     */
    public function getArticle()
    {
        return $this->article;
    }
}
