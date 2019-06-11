<?php
//  /**
//   * Created by PhpStorm.
//   * User: jeromesuhard
//   * Date: 03/06/2019
//   * Time: 15:58
//   */
//
//  namespace AppBundle\Repository;
//
//
//
//  class DefaultRepository extends \Doctrine\ORM\EntityRepository
//  {
//    /**
//     * @param $name
//     * @return array
//     */
//    public function getClientReservation($name)
//    {
//      //recherche par cp du lieu approximatif dans Client pour Administrateur !!!!!!!!!!!!!!
//      //crée objet constructeur de requete sur table r
//      $queryBuilder = $this->createQueryBuilder('r');
//      // utilisation du LIKE avec contrôle entrée setParameter;
//      $query = $queryBuilder
//        ->select('r')
//        /* jointure table client*/
//        ->leftJoin('r.client', 'c')
//        /* requete ciblée sur nom client, avec Like qui permet de retourner une liste de réservations
//        à partir des premières lettres d'un nom de Client */
//        ->where('c.nomClient LIKE :nomClient')
//        ->setParameter('nomClient', '%' . $name . '%')// sécurité injection !!!
//        ->orderBy('r.dateReservation', 'DESC')
//        ->getQuery();
//      $results = $query->getResult();
//      return $results;
//    }
//  }