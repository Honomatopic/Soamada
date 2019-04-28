<?php

namespace AssocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Don
 *
 * @ORM\Table(name="don")
 * @ORM\Entity(repositoryClass="AssocBundle\Repository\DonRepository")
 */
class Don
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
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="campagne", type="string", length=255, nullable=true)
     */
    private $campagne;
        
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;
    
    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=255, nullable=true)
     */
    private $designation;
    
    /**
     * @var straing
     *
     * @ORM\Column(name="date", type="string", length=255, nullable=true)
     */
    private $date;
    
     /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float")
     */
    private $montant;
    
    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255, nullable=true)
     */
    private $statut;
    
     /**
     * @var string
     *
     * @ORM\Column(name="moyen", type="text")
     */
    private $moyen;
    
    /**
     * @var string
     *
     * @ORM\Column(name="options", type="string", length=255, nullable=true)
     */
    private $options;
    
     /**
     * @var text
     *
     * @ORM\Column(name="attestation", type="text",  nullable=true)
     */
    private $attestation;
    
     /**
     * @var text
     *
     * @ORM\Column(name="recu", type="text",  nullable=true)
     */
    private $recu;
    
     /**
     * @var string
     *
     * @ORM\Column(name="donanonyme", type="string", length=255, nullable=true)
     */
    private $donanonyme;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="societe", type="string", length=255)
     */
    private $societe;
    
    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=5)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    private $pays;
    
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="datenaissance", type="string", length=255)
     */
    private $datenaissance;

    /**
     * @var text
     *
     * @ORM\Column(name="commentaire", type="text", length=255)
     */
    private $commentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="numrecu", type="string", length=255)
     */
    private $numrecu;


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Don
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Don
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Don
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set cp
     *
     * @param string $cp
     *
     * @return Don
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Don
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
     * Set email
     *
     * @param string $email
     *
     * @return Don
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Don
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set montant
     *
     * @param float $montant
     *
     * @return Don
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return float
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set moyen
     *
     * @param string $moyen
     *
     * @return Don
     */
    public function setMoyen($moyen)
    {
        $this->moyen = $moyen;

        return $this;
    }

    /**
     * Get moyen
     *
     * @return string
     */
    public function getMoyen()
    {
        return $this->moyen;
    }

    /**
     * Get numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set campagne
     *
     * @param string $campagne
     *
     * @return Don
     */
    public function setCampagne($campagne)
    {
        $this->campagne = $campagne;

        return $this;
    }

    /**
     * Get campagne
     *
     * @return string
     */
    public function getCampagne()
    {
        return $this->campagne;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Don
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Don
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set date
     *
     * @param string $date
     *
     * @return Don
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Don
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set options
     *
     * @param string $options
     *
     * @return Don
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get options
     *
     * @return string
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set attestation
     *
     * @param string $attestation
     *
     * @return Don
     */
    public function setAttestation($attestation)
    {
        $this->attestation = $attestation;

        return $this;
    }

    /**
     * Get attestation
     *
     * @return string
     */
    public function getAttestation()
    {
        return $this->attestation;
    }

    /**
     * Set recu
     *
     * @param string $recu
     *
     * @return Don
     */
    public function setRecu($recu)
    {
        $this->recu = $recu;

        return $this;
    }

    /**
     * Get recu
     *
     * @return string
     */
    public function getRecu()
    {
        return $this->recu;
    }

    /**
     * Set donanonyme
     *
     * @param string $donanonyme
     *
     * @return Don
     */
    public function setDonanonyme($donanonyme)
    {
        $this->donanonyme = $donanonyme;

        return $this;
    }

    /**
     * Get donanonyme
     *
     * @return string
     */
    public function getDonanonyme()
    {
        return $this->donanonyme;
    }

    /**
     * Set societe
     *
     * @param string $societe
     *
     * @return Don
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return string
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Don
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set datenaissance
     *
     * @param string $datenaissance
     *
     * @return Don
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    /**
     * Get datenaissance
     *
     * @return string
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Don
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set numrecu
     *
     * @param string $numrecu
     *
     * @return Don
     */
    public function setNumrecu($numrecu)
    {
        $this->numrecu = $numrecu;

        return $this;
    }

    /**
     * Get numrecu
     *
     * @return string
     */
    public function getNumrecu()
    {
        return $this->numrecu;
    }

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
     * Set numero
     *
     * @param integer $numero
     *
     * @return Don
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }
}
