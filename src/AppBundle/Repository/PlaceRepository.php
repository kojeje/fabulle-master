<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 01/01/2019
   * Time: 17:37
   */

  namespace AppBundle\Repository;


  use Doctrine\ORM\EntityRepository;

  class PlaceRepository extends \Doctrine\ORM\EntityRepository
  {


    public function getLeEventByPlace($cp)
    {

//    requête par lieu, ordre commence par la prochaine date
      $queryBuilder = $this->createQueryBuilder('p');
///  querybuilder classe de doctrine permettant de créer des requêtes en php
      $query = $queryBuilder
//    //equivalent de SELECT * FROM place
        ->select('p')
        /* jointures */
          // avec LeEvent
        ->join('p.leEvent', 'e')
          // avec leShow
        ->leftJoin('e.leShow', 's')
        //On récupère les données des tables liées
        ->addSelect('e')
        ->addSelect('s')
        // Si équivalence entre la saisie et le code postal du lieu
        ->where('p.cp = :cp')
        // Sécurise le formulaire contre des injections sql
        ->setParameter('cp', $cp)
        //trie par dates
        ->orderBy('e.date', 'ASC')
        // GO
        ->getQuery();


      $results = $query->getResult();
      return $results;
    }

  }