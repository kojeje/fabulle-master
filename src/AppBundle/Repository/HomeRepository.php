<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 01/01/2019
   * Time: 17:37
   */

  namespace AppBundle\Repository;


  use Doctrine\ORM\EntityRepository;

  class HomeRepository extends EntityRepository
  {
    public function getAllLeShow($home)
    {
//  QueryBuilder => Pour éxecuter des requêtes


      $queryBuilder =$this
        ->createQueryBuilder('h');
      $query = $queryBuilder
        ->leftJoin('h.post', 'p')
        ->leftJoin('h.leEvent', 'e')
        ->leftJoin('h.leShow', 's')
        ->select('s')
        ->addSelect('p')
        ->addSelect('e')
//      Permet de définir un paramètre de requete de maniere sécurisée
        ->setParameter('home', $home)
//              recupérer la methode createQueryBuilder dans la variable $query et la passer dans $results
        ->getQuery();

//            eq fetch
      $results = $query->getArrayResult();
      return $results;




    }


  }