<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 01/01/2019
   * Time: 17:37
   */

  namespace AppBundle\Repository;


  use Doctrine\ORM\EntityRepository;

  class PostRepository extends EntityRepository
  {

    public function getAllPost($post)
    {
// QueryBuilder => Pour éxecuter des requêtes
// Altenatives  : DQL ou NativeQueries (permet de rentrer du SQL pur)

      $queryBuilder =$this
        ->createQueryBuilder('p');
      $query = $queryBuilder

        ->select('p')

//              Permet de définir un paramètre de requete de maniere sécurisée
        ->setParameter('post', $post)
//              recupérer la methode createQueryBuilder dans la variable $query et la passer dans $results
        ->getQuery();

//            eq fetch
      $results = $query->getArrayResult();
      return $results;
    }


    public function getPostbyCategory($category)
    {
      $queryBuilder =$this->createQueryBuilder('p');

      $query = $queryBuilder
        ->select('p')
        ->where('p.category = :category')
        ->setParameter('category', $category)
        ->getQuery();
//                    eq fetch

      $results = $query->getResult();

      return $results;
    }

    public function getPostbyShowId($id)
    {
      $queryBuilder =$this->createQueryBuilder('p');

      $query = $queryBuilder
        ->leftJoin('p.show','s')
        ->select('p')
        ->addSelect('s')
        ->where('s.id = :id')
        ->setParameter('id', $id)
        ->getQuery();
//                    eq fetch

      $results = $query->getResult();

      return $results;
    }



  }