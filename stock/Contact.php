<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 03/04/2019
   * Time: 22:44
   */

  namespace AppBundle\Entity;
  use Doctrine\ORM\Mapping as ORM;
  use Symfony\Component\Validator\Constraints as Assert;


  //    Colonnes de la table
  /**
   * @ORM\Table(name="contact")
   * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
   */

  class Contact
  {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

// --------------------------------

//    // date de publication
//
//    public function __construct()
//    {
//      $this->setPubliele(new \DateTime());
//    }
//    /**
//     * @ORM\Column(type="datetimetz", nullable=true)
//     *
//     */
//    private $publiele;




    //Civilite

    /**
     * @ORM\Column(type="string")
     *
     */

    private $civilite;

    /**
     * @ORM\Column(type="string")
     *
     */

    private $first_name;

    /**
     * @ORM\Column(type="string")
     *
     */

    private $last_name;

    /**
     * @ORM\Column(type="datetimetz", nullable=true)
     *
     */
    private $birthdate;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */

    private $statut;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     *
     */

    private $tel;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */

    private $ad1;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */

    private $ad2;

    /**
     * @ORM\Column(type="integer", length=5, nullable=true)
     *
     */
    private $ZIP;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */

    private $town;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */

    private $country;

    /**
     * @ORM\Column(type="simple_array", nullable=true)
     *
     */

    private $email;

//------------------------------------------------------------------------------
    //  Getters & Setters

    /**
     * @return mixed
     */
    public function getId()
    {
      return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
      $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPubliele()
    {
      return $this->publiele;
    }

    /**
     * @param mixed $publiele
     */
    public function setPubliele($publiele): void
    {
      $this->publiele = $publiele;
    }

    /**
     * @return mixed
     */
    public function getCivilite()
    {
      return $this->civilite;
    }

    /**
     * @param mixed $civilite
     */
    public function setCivilite($civilite): void
    {
      $this->civilite = $civilite;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
      return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name): void
    {
      $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
      return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name): void
    {
      $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
      return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate): void
    {
      $this->birthdate = $birthdate;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
      return $this->statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut): void
    {
      $this->statut = $statut;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
      return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel): void
    {
      $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getAd1()
    {
      return $this->ad1;
    }

    /**
     * @param mixed $ad1
     */
    public function setAd1($ad1): void
    {
      $this->ad1 = $ad1;
    }

    /**
     * @return mixed
     */
    public function getAd2()
    {
      return $this->ad2;
    }

    /**
     * @param mixed $ad2
     */
    public function setAd2($ad2): void
    {
      $this->ad2 = $ad2;
    }

    /**
     * @return mixed
     */
    public function getZIP()
    {
      return $this->ZIP;
    }

    /**
     * @param mixed $ZIP
     */
    public function setZIP($ZIP): void
    {
      $this->ZIP = $ZIP;
    }

    /**
     * @return mixed
     */
    public function getTown()
    {
      return $this->town;
    }

    /**
     * @param mixed $town
     */
    public function setTown($town): void
    {
      $this->town = $town;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
      return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
      $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
      return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
      $this->email = $email;
    }






  }