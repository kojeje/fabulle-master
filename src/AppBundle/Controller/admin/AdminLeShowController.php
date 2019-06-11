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




  class AdminLeShowController extends Controller
  {
 // Afficher tous les spectacles avec droits d'administration


    /**
     * @Route("/admin/shows", name="admin_shows")
     */
    public function listShowsAdminAction()
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
      return $this->render('@App/admin/shows.html.twig',
        [
          'leShows' => $leShows,
          'leEvents' => $leEvents,
          'posts' => $posts,
          'places' => $places

        ]);

    }
//-----------------------------------------------------------------------------------------
  // Afficher un spectacle en fonction de l'id avec fonction d'administration
    /**
     * @Route("/admin/show/{id}", name="admin_show_id")
     * Je récupère une instance de Doctrine qui appelle une instense de repository
     */

    public function AdminShowIdAction($id)

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
//    On récupère un contenu en fonction de son id
      $leShow = $repository->find($id);
//    On récupère l'entité
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
//    On récupère tous les contenu de cette entité (menu admin)
      $leEvents = $repository->findAll();
//    On récupère l'entité
      $repository = $this->getDoctrine()->getRepository(Place::class);
//    On récupère tous les contenu de cette entité (menu admin)
      $places = $repository->findAll();


//    On renvoie le résultat des requêtes vers la vue selon les variables:
      return $this->render('@App/admin/show.html.twig',
          [
            'leShows' => $leShows,
            'leShow' => $leShow,
            'posts' => $posts,
            'leEvents' => $leEvents,
            'places' => $places

          ]);




    }
// ----------------------------------------------------------------
  //CREATION D'ARTICLE "Spectacle"
    /**
     * @Route("/admin/create_show", name="create_show")
     */

    public function formCreateShow(Request $request)

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



      /* Création d'un nouveau formulaire à partir d'un gabarit "LeShowType" */
      $form = $this->createForm(LeShowType::class, new LeShow);


      /* Associe les données envoyées (éventuellement) par le client via le formulaire à notre variable $form.
      Donc la variable $form contient maintenant aussi les données de $_POST*/
      $form->handleRequest($request);

    /* Si le formulaire est soumis */
      if ($form->isSubmitted()) {

        /* Si le formulaire respecte les contraintes */
        if ($form->isValid()) {
          /* Upload d'image*/
          /* Compteur pour concaténer le nom de chacune des 6 images sur le modèle :"nom . $i" (1 <= $i >= 6) */
          for ($i = 1; $i <= 6; $i++) {

            /* On récupère une entité image grâce aux données envoyées par le formulaire */
            $img = $form->getData();
            $getImg = 'getImg' . $i;
            $File = $img->$getImg();


            /* Renomme l'image pour éviter les doublons de nom */

            /* Si il y a au moins une image à téléverser*/
            if (!is_null($File)) {
              /* On lui donne nom unique grace à la classe "guessExtension" */
              $filename = md5(uniqid()) . '.' . $File->guessExtension();


              try {
                /* Si réussite, on transfert le fichier dans le bon repertoire*/

                $File->move(
                  $this->getParameter('upl_directory'),
                  $filename
                );
                /* Si échec on affiche un message d'erreur*/
              } catch (FileException $e) {
                echo $e->getMessage();
              }
              // important alimente nouveau nom fichier image
              $setImg = 'setImg' . $i;
              $img->$setImg($filename);
            }
          }

          // Upload du fichier pdf (fiche technique du spectacle)

          $tek = $form->getData();
          $getFichetek = 'getFichetek';
          $File = $tek->$getFichetek();

          /* Si il y a un fichier*/
          if (!is_null($File)) {
            $filename = md5(uniqid()) . '.' . $File->guessExtension();


            try {

              $File->move(
                $this->getParameter('upl_directory'),
                $filename
              );
            } catch (FileException $e) {
              echo $e->getMessage();
            }

            $setImg = 'setFichetek';
            $img->$setImg($filename);
          }




          /* Je récupère l'entité manager de doctrine */
          $entityManager = $this->getDoctrine()->getManager();


          /* Je stocke temporairement les données dans l'unité de travail */
          $entityManager->persist($img);
          $entityManager->persist($tek);


          /* Je "pousse" les données dans la Bdd*/
          $entityManager->flush();


          /* J'affiche les messages flash confirmant l'enregistrement */
          $this->addFlash(
            'notice-icon',
            '<i class="flash-icon success fal fa-check"></i>'
          );
          $this->addFlash(
            'notice',
            '<h1 class="h1-flash">Le spectacle a été enregistré</h1>'
          );

//        /* Je redirige ensuite sur la page des spectacles */
          return $this->redirectToRoute('admin_shows');

        } else {
          /* Si les contraintes n'ont pas été respectées j'affice un message d'erreur */
          $this->addFlash(
            'error-icon',
            '<i class="flash-icon error fal fa-times"></i>'
          );
          $this->addFlash(
            'error',
            '<h1 class="h1-flash">Le spectacle n\'a pas été enregistré</h1>'
          );
        }
      }

//    On renvoie le résultat des requêtes vers la vue selon les variables:
      return $this->render('@App/admin/CreateLeShow.html.twig',
        [
          'formleshow' => $form->createView(),
          'leShows' => $leShows,
          'posts' => $posts,
          'leEvents' => $leEvents,
          'places' => $places
        ]);




    }
//--------------------------------------------------------------------------------------------------------------------------------------------
  //UPDATE Spectacle

    /**
     * @Route("/admin/update_show/{id}", name="admin_update_show")
     */
    public function UpdateLeShowAction(Request $request, $id)
    {
//    ON APPELLE LES ENTITÉS ET LES REQUETES VOULUES

//    On récupère l'entité
      $repository = $this->getDoctrine()->getRepository(Post::class);
//    On récupère tous les contenu de cette entité (menu admin)
      $posts = $repository->findAll();
//    On récupère l'entité
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
//    On récupère un contenu en fonction de son id
      $leShow = $repository->find($id);
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


      for ($i = 1; $i <= 6; $i++) {

        $getter = 'getImg' . $i;
        $setter = 'setImg' . $i;

        $oldImages[$i] = $leShow->$getter();

        // tester si image existe, alors récupère entité piece puis ajoute attribut Image qui est un string

        if ($leShow->$getter()) {

          //redéfinit Image
          $leShow->$setter(
            new File($this->getParameter('upl_directory') . '/' . $leShow->$getter())
          );

        }

      }
      //recherche entité leShow existant, puis créé la forme
      $form = $this->createForm(LeShowType::class, $leShow);

      // associe les données envoyées (éventuellement) par le client via le formulaire
      //à notre variable $form. Donc la variable $form contient maintenant aussi $_POST
      //handlerequest reremplit le formulaire, récupère données et les reinjecte dans formulaire
      $form->handleRequest($request);
//      var_dump($form->getData()->getImg1());die;

      //isSubmitted vérifie si il y a bien un contenu form envoyé, puis on regarde si valide (à compléter plus tard)

      /* Si le formulaire est soumis */
      if ($form->isSubmitted()) {
        if ($form->isValid()) {
          $leShow = $form->getData();

          for ($i = 1; $i <= 6; $i++) {

            $getter = 'getImg' . $i;
            $setter = 'setImg' . $i;

//            $oldImages[$i] = $leShow->$getter();
//

            if ($leShow->$getter() !== NULL) {

              // créé file avec getImg . $i, récupère string chemin image

              $file = $leShow->$getter();

              /* Si il y a une image*/
              if (!is_null($file)) {

                //génère nom unique pour le fichier image
                $fileName = md5(uniqid()) . '.' . $file->guessExtension();


                try {
                  $file->move(
                    $this->getParameter('upl_directory'),
                    $fileName
                  );


                } catch (FileException $e) {
                  echo $e->getMessage();
                  // ... handle exception if something happens during file upload
                }


                // important alimente modification !!!!!! chemin vers image


                $leShow->$setter(
                  $fileName
                );
              }
            } else {
              // si pas de changement on recupère l'ancien nom
              $leShow->$setter($oldImages[$i]);

            }

          }

        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();


        // j'enregistre en base de donnée, persist met dans zone tampon provisoire de l'unité de travail
        $entityManager->persist($leShow);
        //mise à jour BD, envoy à bd
        $entityManager->flush();

        // Renvoi de confirmation d'enregistrement Message flash
          $this->addFlash(
            'notice-icon',
            '<i class="flash-icon success fal fa-check"></i>'
          );
          $this->addFlash(
          'notice',
          'Votre spectacle a bien été modifié!'
        );

        return $this->redirectToRoute('admin_shows');
      } else {
          $this->addFlash(
            'error-icon',
            '<i class="flash-icon error fal fa-times"></i>'
          );
        $this->addFlash(
          'notice',
          'Votre spectacle n\'a pas été modifié!'
        );
      }
    }

//    On renvoie le résultat des requêtes vers la vue selon les variables:
      return $this->render(
        '@App/admin/CreateLeShow.html.twig',
        [
          'formleshow' => $form->createView(),
          'leShows' => $leShows,
          'places' => $places,
          'leEvents' => $leEvents
        ]
      );
    }

//--------------------------------------------------------------------------------------------------------------------------------------------
    //Delete Spectacle

    /**
     * @Route("/admin/delete_show/{id}", name="admin_delete_show")
     * Suppression d'un livre
     */
    public function supprLeShowAction($id)
    {
//    ON APPELLE LES ENTITÉS ET LES REQUETES VOULUES

//    On récupère l'entité
      $repository = $this->getDoctrine()->getRepository(Post::class);
//    On récupère tous les contenu de cette entité (menu admin)
      $posts = $repository->findAll();
//
//    On récupère l'entité
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
//    On récupère tous les contenu de cette entité (menu admin)
      $leEvents = $repository->findAll();
//    On récupère l'entité
      $repository = $this->getDoctrine()->getRepository(Place::class);
//    On récupère tous les contenu de cette entité (menu admin)
      $places = $repository->findAll();
//    On récupère l'entité
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
//    On récupère tous les contenu de cette entité (menu admin)
      $leShows = $repository->findAll();
//    On récupère un contenu en fonction de son id
      $leShow = $repository->find($id);
      //je recupère l'entity manager de doctrine pour avoir la fonction "remove"
      $entityManager = $this->getDoctrine()->getManager();
      //Suppression du contenu
      $entityManager->remove($leShow);
      $entityManager->flush();
      $this->addFlash(
        'notice-icon',
        '<i class="flash-icon success fal fa-check"></i>'
      );
      $this->addFlash(

        'notice',
        'Le spectacle a été supprimé'
      );
//    On renvoie le résultat des requêtes vers la vue selon les variables:
      return $this->redirectToRoute('admin_shows',
        [

          'leShows' => $leShows,
          'posts' => $posts,
          'leEvents' => $leEvents,
          'leShow' => $leShow,
          'places' => $places
        ]);
    }
  }
