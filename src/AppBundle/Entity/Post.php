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
   * @ORM\Table(name="Post")
   * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
   */

  class Post
  {
    /**
     * @ORM\Column(type="integer")
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

// --------------------------------

    // date de publication

    public function __construct()
    {
      $this->setPubliele(new \DateTime());
    }
    /**
     * @ORM\Column(type="datetimetz", nullable=true)
     *
     */
    private $publiele;

    /**
     * @ORM\Column(type="string")
     *
     */

    private $categorie;

    // --------------------------------

    //Titre

    /**
     * @ORM\Column(type="string")
     *
     */

    private $titre;

// --------------------------------
    // Corps de l'article

    // texte principal

    /**
     * @ORM\Column(type="text" )
     * @Assert\Length(
     *      min = 50,
     *      max = 100000,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */

    private $text1;


    // image principale

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(maxSize="10000000",
     * mimeTypes = {"image/jpeg", "image/png", "image/gif", "image/jpg"},
     * mimeTypesMessage = "Ce fichier doit être une image (jpg, jpeg, png)"
     * )
     *
     */
    private $img1;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_alt1;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_title1;



//--------------------------------------------------------------------
//  SLIDER
//_____________________________________________________________________

    // image slider

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(maxSize="10000000",
     * mimeTypes = {"image/jpeg", "image/png", "image/gif", "image/jpg"},
     * mimeTypesMessage = "Ce fichier doit être une image (jpg, jpeg, png)"
     * )
     *
     */
    private $img2;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_alt2;

    // image slider

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(maxSize="10000000",
     * mimeTypes = {"image/jpeg", "image/png", "image/gif", "image/jpg"},
     * mimeTypesMessage = "Ce fichier doit être une image (jpg, jpeg, png)"
     * )
     *
     */
    private $img3;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_alt3;

    // image slider

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img4;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_alt4;

    // image slider

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img5;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_alt5;

    // Caption slider

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $sl_caption;


//-------------------------------------------------------------
//  VIDEO
//_____________________________________________________________



    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $youtube;




//------------------------------------------------------------------------------

    // Relations


    /**
     * @ORM\ManyToOne(targetEntity="LeShow", inversedBy="post")
     */
    private $leShow;

    /**
     * @ORM\ManyToOne(targetEntity="LeEvent", inversedBy="post")
     */
    private $leEvent;

    /**
     * @ORM\ManyToOne(targetEntity="Place", inversedBy="post")
     */
    private $place;





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
    public function getTitre()
    {
      return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre): void
    {
      $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getText1()
    {
      return $this->text1;
    }

    /**
     * @param mixed $text1
     */
    public function setText1($text1): void
    {
      $this->text1 = $text1;
    }

    /**
     * @return mixed
     */
    public function getImg1()
    {
      return $this->img1;
    }

    /**
     * @param mixed $img1
     */
    public function setImg1($img1): void
    {
      $this->img1 = $img1;
    }

    /**
     * @return mixed
     */
    public function getImgAlt1()
    {
      return $this->img_alt1;
    }

    /**
     * @param mixed $img_alt1
     */
    public function setImgAlt1($img_alt1): void
    {
      $this->img_alt1 = $img_alt1;
    }

    /**
     * @return mixed
     */
    public function getImgTitle1()
    {
      return $this->img_title1;
    }

    /**
     * @param mixed $img_title1
     */
    public function setImgTitle1($img_title1): void
    {
      $this->img_title1 = $img_title1;
    }

    /**
     * @return mixed
     */
    public function getImg2()
    {
      return $this->img2;
    }

    /**
     * @param mixed $img2
     */
    public function setImg2($img2): void
    {
      $this->img2 = $img2;
    }

    /**
     * @return mixed
     */
    public function getImgAlt2()
    {
      return $this->img_alt2;
    }

    /**
     * @param mixed $img_alt2
     */
    public function setImgAlt2($img_alt2): void
    {
      $this->img_alt2 = $img_alt2;
    }

    /**
     * @return mixed
     */
    public function getImg3()
    {
      return $this->img3;
    }

    /**
     * @param mixed $img3
     */
    public function setImg3($img3): void
    {
      $this->img3 = $img3;
    }

    /**
     * @return mixed
     */
    public function getImgAlt3()
    {
      return $this->img_alt3;
    }

    /**
     * @param mixed $img_alt3
     */
    public function setImgAlt3($img_alt3): void
    {
      $this->img_alt3 = $img_alt3;
    }

    /**
     * @return mixed
     */
    public function getImg4()
    {
      return $this->img4;
    }

    /**
     * @param mixed $img4
     */
    public function setImg4($img4): void
    {
      $this->img4 = $img4;
    }

    /**
     * @return mixed
     */
    public function getImgAlt4()
    {
      return $this->img_alt4;
    }

    /**
     * @param mixed $img_alt4
     */
    public function setImgAlt4($img_alt4): void
    {
      $this->img_alt4 = $img_alt4;
    }

    /**
     * @return mixed
     */
    public function getImg5()
    {
      return $this->img5;
    }

    /**
     * @param mixed $img5
     */
    public function setImg5($img5): void
    {
      $this->img5 = $img5;
    }

    /**
     * @return mixed
     */
    public function getImgAlt5()
    {
      return $this->img_alt5;
    }

    /**
     * @param mixed $img_alt5
     */
    public function setImgAlt5($img_alt5): void
    {
      $this->img_alt5 = $img_alt5;
    }

    /**
     * @return mixed
     */
    public function getSlCaption()
    {
      return $this->sl_caption;
    }

    /**
     * @param mixed $sl_caption
     */
    public function setSlCaption($sl_caption): void
    {
      $this->sl_caption = $sl_caption;
    }

    /**
     * @return mixed
     */
    public function getYoutube()
    {
      return $this->youtube;
    }

    /**
     * @param mixed $youtube
     */
    public function setYoutube($youtube): void
    {
      $this->youtube = $youtube;
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





  }