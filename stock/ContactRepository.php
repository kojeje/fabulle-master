<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 01/01/2019
   * Time: 17:37
   */

  namespace AppBundle\Repository;


  use Doctrine\ORM\EntityRepository;

  class ContactRepository extends EntityRepository
  {
    public function getAllContact($contact)
    {
//  QueryBuilder => Pour éxecuter des requêtes


      $queryBuilder =$this
        ->createQueryBuilder('c');
      $query = $queryBuilder

        ->select('s')

//      Permet de définir un paramètre de requete de maniere sécurisée
        ->setParameter('contact', $contact)
//              recupérer la methode createQueryBuilder dans la variable $query et la passer dans $results
        ->getQuery();

//            eq fetch
      $results = $query->getArrayResult();
      return $results;




    }


  }