<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 09/01/2019
   * Time: 21:25
   */
  namespace AppBundle\Controller\admin;



  use AppBundle\Entity\LeEvent;
  use AppBundle\Entity\LeShow;
  use AppBundle\Entity\Place;
  use AppBundle\Entity\Post;
  use AppBundle\Form\LeEventType;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;
  use AppBundle\Repository\LeEventRepository;


  class AdminLeEventController extends Controller
  {

    // Afficher tous les event avec droits d'administration


    /**
     * @Route("/admin/events", name="admin_events")
     */
    public function listEventsAdminAction()
    {
//    ON APPELLE LES ENTITÉS ET LES REQUETES VOULUES

//    On récupère l'entité
      $repository = $this->getDoctrine()->getRepository(Post::class);
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
//    On récupère l'entité
      $repository = $this->getDoctrine()->getRepository(Place::class);
//    On récupère tous les contenu de cette entité (menu admin)
      $places = $repository->findAll();


//    On renvoie le résultat des requêtes vers la vue selon les variables:
      return $this->render('@App/admin/events.html.twig',
        [

          'posts' => $posts,
          'leShows' => $leShows,
          'leEvents' => $leEvents,
          'places' => $places


        ]);

    }
// Afficher un event en fonction de l'id avec fonction d'administration

    /**
     * @Route("/admin/event/{id}", name="admin_event_id")
     * Je récupère une instance de Doctrine qui appelle une instense de repository
     */

    public function AdminEventIdAction(Request $request, $id)

    {
//    ON APPELLE LES ENTITÉS ET LES REQUETES VOULUES

//    On récupère l'entité
      $repository = $this->getDoctrine()->getRepository(Post::class);
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
//    On récupère un contenu en fonction de son id
      $leEvent = $repository->find($id);
//    On récupère l'entité
      $repository = $this->getDoctrine()->getRepository(Place::class);
//    On récupère tous les contenu de cette entité (menu admin)
      $places = $repository->findAll();


//    On renvoie le résultat des requêtes vers la vue selon les variables:
      return $this->render('@App/admin/event.html.twig',
        [
          'leEvent' => $leEvent,
          'leEvents' => $leEvents,
          'posts' => $posts,
          'places' => $places,
          'leShows' => $leShows,


        ]);


    }


  /**
   * @Route("/admin/create_event", name="create_event")
   */

  public
  function formCreateleEvent(Request $request)

  {
//    ON APPELLE LES ENTITÉS ET LES REQUETES VOULUES

//    On récupère l'entité
    $repository = $this->getDoctrine()->getRepository(Post::class);
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
//    On récupère l'entité
    $repository = $this->getDoctrine()->getRepository(Place::class);
//    On récupère tous les contenu de cette entité (menu admin)
    $places = $repository->findAll();

    /* Création d'un nouveau formulaire à partir d'un gabarit "Eventtype" */
    $form = $this->createForm(LeEventType::class, new LeEvent);

    /* Associe les données envoyées (éventuellement) par le client via le formulaire à notre variable $form.
    Donc la variable $form contient maintenant aussi les données de $_POST*/
    $form->handleRequest($request);

//  Si le formulaire est soumi
    if ($form->isSubmitted()) {


      /* Si le formulaire respecte les contraintes */
      if ($form->isValid()) {
        // je recupere une entité grace aux donnees envoye par le formulaire
        $leEvent = $form->getData();

        /* Je récupère l'entité manager de doctrine */

        $entityManager = $this->getDoctrine()->getManager();

        /* Je stocke temporairement les données dans l'unité de travail */
        $entityManager->persist($leEvent);

        /* Je "pousse" les données dans la Bdd*/
        $entityManager->flush();

        /* J'affiche les messages flash confirmant l'enregistrement */
        $this->addFlash(
          'notice-icon',
          '<i class="flash-icon success fal fa-check"></i>'
        );
        $this->addFlash(
          'notice',
          '<h1 class="h1-flash">L\'évènement a été enregistré</h1>'
        );
//      Et je renvoie vers la vue suivante
        return $this->redirectToRoute('admin_events');
//    Sinon
      } else {
        /* J'affiche les messages flash en cas d'échec */
        $this->addFlash(
          'error-icon',
          '<i class="flash-icon error fal fa-times"></i>'
        );
        $this->addFlash(
          'notice',
          'Votre évènement n\'a pas été modifié!'
        );
        /* Si les contraintes n'ont pas été respectées j'affice un message d'erreur */
        $this->addFlash(
          'error-icon',
          '<i class="flash-icon error fal fa-times"></i>'
        );
        $this->addFlash(
          'error',
          '<h1 class="h1-flash">L\'évènement n\'a été enregistré</h1>'
        );
      }
//
    }

//    On renvoie le résultat des requêtes vers la vue selon les variables:
    return $this->render('@App/admin/CreateLeEvent.html.twig',
      [
        'formleEvent' => $form->createView(),
        'leShows' => $leShows,
        'leEvents' => $leEvents,
        'places' => $places,
        'posts' => $posts


      ]);

  }

//


  //--------------------------------------------------------------------------------------------------------------------------------------------
  //UPDATE EVÈNEMENT

  /**
   * @Route("/admin/update_event/{id}", name="admin_update_event")
   */
  public
  function UpdateLeEventAction(Request $request, $id)
  {

//    ON APPELLE LES ENTITÉS ET LES REQUETES VOULUES

//    On récupère l'entité
    $repository = $this->getDoctrine()->getRepository(Post::class);
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
//  On récupère un contenu en fonction de son id
    $leEvent = $repository->find($id);
//    On récupère l'entité
    $repository = $this->getDoctrine()->getRepository(Place::class);
//    On récupère tous les contenu de cette entité (menu admin)
    $places = $repository->findAll();


    //recherche entité leEvent existant, puis créé la forme
    $form = $this->createForm(LeEventType::class, $leEvent);

    // associe les données envoyées (éventuellement) par le client via le formulaire
    //à notre variable $form. Donc la variable $form contient maintenant aussi $_POST
    //handlerequest reremplit le formulaire, récupère données et les reinjecte dans formulaire
    $form->handleRequest($request);
//      var_dump($form->getData()->getImg1());die;

    //isSubmitted vérifie si il y a bien un contenu form envoyé, puis on regarde si valide (à compléter plus tard)

    /* Si le formulaire est soumis */
    if ($form->isSubmitted()) {
      if ($form->isValid()) {
        $leEvent = $form->getData();


        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();


        // j'enregistre en base de donnée, persist met dans zone tampon provisoire de l'unité de travail
        $entityManager->persist($leEvent);
        //mise à jour BD, envoy à bd
        $entityManager->flush();

        // Renvoi de confirmation d'enregistrement Message flash
        $this->addFlash(
          'notice-icon',
          '<i class="flash-icon success fal fa-check"></i>'
        );
        $this->addFlash(
          'notice',
          'Votre évènement a bien été modifié!'
        );

        return $this->redirectToRoute('admin_shows');
      } else {
        $this->addFlash(
          'error-icon',
          '<i class="flash-icon error fal fa-times"></i>'
        );
        $this->addFlash(
          'notice',
          'Votre évènement n\'a pas été modifié!'
        );
      }
    }


    return $this->render(
      '@App/admin/CreateLeEvent.html.twig',
      [
        'formleEvent' => $form->createView(),
        'leShows' => $leShows,
        'leEvents' => $leEvents,
        'places' => $places
      ]
    );
  }

  //--------------------------------------------------------------------------------------------------------------------------------------------
  //Delete Spectacle

  /**
   * @Route("/admin/delete_event/{id}", name="admin_delete_event")
   * Suppression d'un livre
   */
  public
  function supprLeEventAction($id)
  {
    //je sélectionne mon entity : "LeShow"
    $repository = $this->getDoctrine()->getRepository(LeShow::class);
    $leShows = $repository->findAll();
    $repository = $this->getDoctrine()->getRepository(LeEvent::class);
    $leEvents = $repository->findAll();
    $repository = $this->getDoctrine()->getRepository(Post::class);
    $posts = $repository->findAll();
    $repository = $this->getDoctrine()->getRepository(Place::class);
    $places = $repository->findAll();
    //je recupère l'entity manager de doctrine pour avoir la fonction "remove"
    $entityManager = $this->getDoctrine()->getManager();
    //je sélectionne l'id de mon objet
    $leEvent = $repository->find($id);
    $entityManager->remove($leEvent);
    $entityManager->flush();
    $this->addFlash(
      'notice-icon',
      '<i class="flash-icon success fal fa-check"></i>'
    );
    $this->addFlash(

      'notice',
      'L\'évènement a été supprimé'
    );
    return $this->redirectToRoute('admin_events',
      [

        'leShows' => $leShows,
        'posts' => $posts,
        'leEvents' => $leEvents,
        'leEvent' => $leEvent,
        'places' => $places
      ]);
  }

  }
