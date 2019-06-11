<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 03/04/2019
   * Time: 22:44
   */


  namespace AppBundle\Entity;
// Appelle des classes Symfony et Doctrine
//Doctrine ORM Gère le mapping et les requêtes en base de données
  use Doctrine\ORM\Mapping as ORM;
// Contraintes
  use Symfony\Component\Validator\Constraints as Assert;


  //    Colonnes de la table
  /**
   * @ORM\Table(name="leShow")
   * @ORM\Entity(repositoryClass="AppBundle\Repository\LeShowRepository")
   */

  class LeShow
  {
    /**
     * @ORM\Column(type="integer")
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


// --------------------------------

//    // disponibilité (booléen)
//
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $dispo_boolean;
//

// --------------------------------

    // date de création

    /**
     * @ORM\Column(type="date", nullable=true)
     *
     */
    private $creation_date;


    // --------------------------------

    //Titre

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */

    private $titre;

// --------------------------------
    // Corps de l'article

    // texte principal

    /**
     * @ORM\Column(type="text", nullable=true)
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


//-------------------------------------------------------------
//  données sur le spectacle
//_____________________________________________________________

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $genre;
    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $duree;

    /**
     * @ORM\Column(type="integer", length=1, nullable=true)
     */
    private $min_age;

    /**
     * @ORM\Column(type="integer", length=1, nullable=true)
     */
    private $max_age;

    /**
     * @ORM\Column(type="integer", length=1, nullable=true)
     */
    private $min_artist;

    /**
     * @ORM\Column(type="integer", length=1, nullable=true)
     */
    private $max_artist;
    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $jauge_max;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $tarif;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(maxSize="3M",
     *  mimeTypes = {"application/pdf", "application/x-pdf"},
     *      mimeTypesMessage = "Seulement un fichier PDF"
     * )
     */
    private $fichetek;
// --------------------------------

    // sub_title optionnel

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      max = 255,
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */

    private $sub2;

    // Texte optionnel

    /**
     * @ORM\Column(type="text", nullable=true )
     * @Assert\Length(
     *      max = 10000,
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $text2;

    // image optionnelle
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



    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_title2;


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
    private $img3;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_alt3;

    // image slider

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(maxSize="10000000",
     * mimeTypes = {"image/jpeg", "image/png", "image/gif", "image/jpg"},
     * mimeTypesMessage = "Ce fichier doit être une image (jpg, jpeg, png)"
     * )
     *
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

    // image slider

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img6;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_alt6;

    // Caption slider

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $sl_caption1;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $sl_caption2;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $sl_caption3;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $sl_caption4;


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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\LeEvent", mappedBy="leShow")
     */
    private $leEvent;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Post", mappedBy="leShow")
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
    public function getDispoBoolean()
    {
      return $this->dispo_boolean;
    }

    /**
     * @param mixed $dispo_boolean
     */
    public function setDispoBoolean($dispo_boolean): void
    {
      $this->dispo_boolean = $dispo_boolean;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
      return $this->creation_date;
    }

    /**
     * @param mixed $creation_date
     */
    public function setCreationDate($creation_date): void
    {
      $this->creation_date = $creation_date;
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
    public function getGenre()
    {
      return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre): void
    {
      $this->genre = $genre;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
      return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree): void
    {
      $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getMinAge()
    {
      return $this->min_age;
    }

    /**
     * @param mixed $min_age
     */
    public function setMinAge($min_age): void
    {
      $this->min_age = $min_age;
    }

    /**
     * @return mixed
     */
    public function getMaxAge()
    {
      return $this->max_age;
    }

    /**
     * @param mixed $max_age
     */
    public function setMaxAge($max_age): void
    {
      $this->max_age = $max_age;
    }

    /**
     * @return mixed
     */
    public function getMinArtist()
    {
      return $this->min_artist;
    }

    /**
     * @param mixed $min_artist
     */
    public function setMinArtist($min_artist): void
    {
      $this->min_artist = $min_artist;
    }

    /**
     * @return mixed
     */
    public function getMaxArtist()
    {
      return $this->max_artist;
    }

    /**
     * @param mixed $max_artist
     */
    public function setMaxArtist($max_artist): void
    {
      $this->max_artist = $max_artist;
    }

    /**
     * @return mixed
     */
    public function getJaugeMax()
    {
      return $this->jauge_max;
    }

    /**
     * @param mixed $jauge_max
     */
    public function setJaugeMax($jauge_max): void
    {
      $this->jauge_max = $jauge_max;
    }

    /**
     * @return mixed
     */
    public function getTarif()
    {
      return $this->tarif;
    }

    /**
     * @param mixed $tarif
     */
    public function setTarif($tarif): void
    {
      $this->tarif = $tarif;
    }

    /**
     * @return mixed
     */
    public function getSub2()
    {
      return $this->sub2;
    }

    /**
     * @param mixed $sub2
     */
    public function setSub2($sub2): void
    {
      $this->sub2 = $sub2;
    }

    /**
     * @return mixed
     */
    public function getText2()
    {
      return $this->text2;
    }

    /**
     * @param mixed $text2
     */
    public function setText2($text2): void
    {
      $this->text2 = $text2;
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
    public function getImg6()
    {
      return $this->img6;
    }

    /**
     * @param mixed $img6
     */
    public function setImg6($img6): void
    {
      $this->img6 = $img6;
    }

    /**
     * @return mixed
     */
    public function getImgAlt6()
    {
      return $this->img_alt6;
    }

    /**
     * @param mixed $img_alt6
     */
    public function setImgAlt6($img_alt6): void
    {
      $this->img_alt6 = $img_alt6;
    }

    /**
     * @return mixed
     */
    public function getSlCaption1()
    {
      return $this->sl_caption1;
    }

    /**
     * @param mixed $sl_caption1
     */
    public function setSlCaption1($sl_caption1): void
    {
      $this->sl_caption1 = $sl_caption1;
    }

    /**
     * @return mixed
     */
    public function getSlCaption2()
    {
      return $this->sl_caption2;
    }

    /**
     * @param mixed $sl_caption2
     */
    public function setSlCaption2($sl_caption2): void
    {
      $this->sl_caption2 = $sl_caption2;
    }

    /**
     * @return mixed
     */
    public function getSlCaption3()
    {
      return $this->sl_caption3;
    }

    /**
     * @param mixed $sl_caption3
     */
    public function setSlCaption3($sl_caption3): void
    {
      $this->sl_caption3 = $sl_caption3;
    }

    /**
     * @return mixed
     */
    public function getSlCaption4()
    {
      return $this->sl_caption4;
    }

    /**
     * @param mixed $sl_caption4
     */
    public function setSlCaption4($sl_caption4): void
    {
      $this->sl_caption4 = $sl_caption4;
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
    public function getFichetek()
    {
      return $this->fichetek;
    }

    /**
     * @param mixed $fichetek
     */
    public function setFichetek($fichetek): void
    {
      $this->fichetek = $fichetek;
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
    public function getImgTitle2()
    {
      return $this->img_title2;
    }

    /**
     * @param mixed $img_title2
     */
    public function setImgTitle2($img_title2): void
    {
      $this->img_title2 = $img_title2;
    }

    /**
     * @return mixed
     */
    public function getVideoBoolean()
    {
      return $this->video_boolean;
    }

    /**
     * @param mixed $video_boolean
     */
    public function setVideoBoolean($video_boolean): void
    {
      $this->video_boolean = $video_boolean;
    }

}