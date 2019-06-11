<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 04/04/2019
   * Time: 14:59
   */

  namespace AppBundle\Entity;
  use Doctrine\ORM\Mapping as ORM;

  //    Colonnes de la table
  /**
   * @ORM\Table(name="place")
   * @ORM\Entity(repositoryClass="AppBundle\Repository\PlaceRepository")
   */

  class Place
  {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    public function __construct()
    {
      $this->setPubliele(new \DateTime());
    }

    /**
     * @ORM\Column(type="datetimetz")
     *
     */
    private $publiele;

    /**
     * @ORM\Column(type="string", nullable=true)
     */

    private $name;


    /**
     * @ORM\Column(type="text", nullable=true)
     */

    private $presentation;


    /**
     * @ORM\Column(type="string", nullable=true)
     */

    private $ad1;

    /**
     * @ORM\Column(type="string", nullable=true)
     */

    private $ad2;

    /**
     * @ORM\Column(type="integer", length=5, nullable=true)
     */
    private $cp;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $commune;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $country;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $tel;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $site;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $email;

    /**
     * @ORM\Column(type="blob", nullable=true)
     *
     */
    private $gmap;






// ---------------------------------------------------------------------------
//  Relations
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\LeEvent", mappedBy="place")
     */
    private $leEvent;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Post", mappedBy="place")
     */
    private $post;

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
    public function getName()
    {
      return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
      $this->name = $name;
    }


    /**
     * @return mixed
     */
    public function getPresentation()
    {
      return $this->presentation;
    }

    /**
     * @param mixed $presentation
     */
    public function setPresentation($presentation): void
    {
      $this->presentation = $presentation;
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
    public function getCp()
    {
      return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp): void
    {
      $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getCommune()
    {
      return $this->commune;
    }

    /**
     * @param mixed $commune
     */
    public function setCommune($commune): void
    {
      $this->commune = $commune;
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
    public function getSite()
    {
      return $this->site;
    }

    /**
     * @param mixed $site
     */
    public function setSite($site): void
    {
      $this->site = $site;
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

    /**
     * @return mixed
     */
    public function getGmap()
    {
      if ($this->gmap != null)
        return stream_get_contents($this->gmap);

      return $this->gmap;
    }

    /**
     * @param mixed $gmap
     */
    public function setGmap($gmap): void
    {
      $this->gmap = $gmap;
    }

    /**
     * @return mixed
     */
    public function getLeEvent()
    {
      return $this->leEvent;
    }

    /**
     * @param mixed $leEvent
     */
    public function setLeEvent($leEvent): void
    {
      $this->leEvent = $leEvent;
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
    public function getPost()
    {
      return $this->post;
    }

    /**
     * @param mixed $post
     */
    public function setPost($post): void
    {
      $this->post = $post;
    }



  }