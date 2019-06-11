<?php
// src/AppBundle/Entity/User.php

  namespace AppBundle\Entity;

  use FOS\UserBundle\Model\User as BaseUser;
  use Doctrine\ORM\Mapping as ORM;
  use Symfony\Component\Validator\Mapping\ClassMetadata;
  use Symfony\Component\Validator\Constraints as Assert;

  /**
   * @ORM\Entity
   * @ORM\Table(name="fos_user")
   */
  class User extends BaseUser
  {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;




    public function __construct()
    {
      parent::__construct();

    }

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






  }