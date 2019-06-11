<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 03/04/2019
   * Time: 22:28
   */

  namespace AppBundle\Entity;
  use Doctrine\ORM\Mapping as ORM;


  /**
   * @ORM\Table(name="LeEvent")
   * @ORM\Entity(repositoryClass="AppBundle\Repository\LeEventRepository")
   */
  class LeEvent
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
    private $categorie;


    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;




// ---------------------------------------------------------------------------
    //  Relations

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LeShow", inversedBy="leEvent")
     *
     */
    private $leShow;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Place", inversedBy="leEvent")
     */
    private $place;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Post", mappedBy="leEvent")
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
    public function getCategorie()
    {
      return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie): void
    {
      $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
      return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
      $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getLeShow()
    {
      return $this->leShow;
    }

    /**
     * @param mixed $leShow
     */
    public function setLeShow($leShow): void
    {
      $this->leShow = $leShow;
    }

    /**
     * @return mixed
     */
    public function getPlace()
    {
      return $this->place;
    }



    /**
     * @param mixed $place
     */
    public function setPlace($place): void
    {
      $this->place = $place;
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