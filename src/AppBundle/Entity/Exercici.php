<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="exercici")
 */
class Exercici
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
    private $Id;

    /**
     * @ORM\Column(type="integer", name="id_exercici")
     */
    private $iIdExercici;

    /**
     * Nom exercici
     *
     * @ORM\Column(type="string", length=15, name="nom", nullable=false, options={"fixed":false, "comment":"Nom exercici"})
     */
    private $sNom;

    /**
     * Get Id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set iIdExercici
     *
     * @param integer $iIdExercici
     * @return Exercici
     */
    public function setIIdExercici($iIdExercici)
    {
        $this->iIdExercici = $iIdExercici;

        return $this;
    }

    /**
     * Get iIdExercici
     *
     * @return integer
     */
    public function getIIdExercici()
    {
        return $this->iIdExercici;
    }

    /**
     * Set sNom
     *
     * @param string $sNom
     * @return Exercici
     */
    public function setSNom($sNom)
    {
        $this->sNom = $sNom;

        return $this;
    }

    /**
     * Get sNom
     *
     * @return string
     */
    public function getSNom()
    {
        return $this->sNom;
    }

}
