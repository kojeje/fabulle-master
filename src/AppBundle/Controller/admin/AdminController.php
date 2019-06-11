<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard*
   */
  namespace AppBundle\Controller\admin;



  use AppBundle\Entity\LeEvent;
  use AppBundle\Entity\LeShow;
  use AppBundle\Entity\Post;
  use AppBundle\Entity\Place;
  use AppBundle\Form\LeShowType;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;
  use Symfony\Component\HttpFoundation\File\Exception\FileException;
  use Symfony\Component\HttpFoundation\File\File; // pour modifier image crée chemin




  class AdminController extends Controller
  {
    /**
     * @Route("/admin/", name="admin_home")
     */
    public function AdminHomeidAction()
    {
//    ON APPELLE LES ENTITÉS ET LES REQUETES VOULUES
//    On récupère l'entité
      $repository = $this->getDoctrine()->getRepository(Post::class);
//    On récupère la page ayant une id précise
      $post = $repository->find(1);
//    On récupère tous les contenu de cette entité (menu admin)
      $posts = $repository->findAll();
//    On récupère l'entité
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
//    On récupère tous les contenu de cette entité (menu admin)
      $leShows = $repository->findAll();
//    On récupère l'entité
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
//    On récupère tous les contenu de cette entité (menu admin)
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Place::class);
//    On récupère tous les contenu de cette entité (menu admin)
      $places = $repository->findAll();

//    On renvoie le résultat des requêtes vers la vue selon les variables:
      return $this->render('@App/admin/home.html.twig',
        [
          'post' => $post,
          'leShows' => $leShows,
          'leEvents' => $leEvents,
          'posts' => $posts,
          'places' => $places
        ]);


    }


  }