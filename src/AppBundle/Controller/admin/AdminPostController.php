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
  use AppBundle\Form\PostType;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;
  use Symfony\Component\HttpFoundation\File\Exception\FileException;
  use Symfony\Component\HttpFoundation\File\File; // pour modifier image crée chemin




  class AdminPostController extends Controller
  {
  // Afficher tous les articles avec droits d'administration


    /**
     * @Route("/admin/posts", name="admin_posts")
     */
    public function listPostsAdminAction()
    {
//      On récupère le contenu de l'Entity dans la variable repository
        $repository = $this->getDoctrine()->getRepository(Post::class);
//      on récupère l'ensemble des articles
        $posts = $repository->findAll();
//      On récupère le contenu de l'Entity dans la variable repository
        $repository = $this->getDoctrine()->getRepository(LeShow::class);
        $leShows = $repository->findAll();
//      On récupère le contenu de l'Entity dans la variable repository
        $repository = $this->getDoctrine()->getRepository(LeEvent::class);
//      on récupère l'ensemble des articles
        $leEvents = $repository->findAll();
//      On récupère le contenu de l'Entity dans la variable repository
        $repository = $this->getDoctrine()->getRepository(Place::class);
//      on récupère l'ensemble des articles
        $places = $repository->findAll();

      return $this->render('@App/admin/posts.html.twig',
        [
          'leShows' => $leShows,
          'posts' => $posts,
          'leEvents' => $leEvents,
          'places' => $places
        ]);
    }
// ----------------------------------------------------------------
//  Afficher coté admin un article en fonction de l'id
    /**
     * @Route("/admin/post/{id}", name="admin_post_id")
     * Je récupère une instance de Doctrine qui appelle une instense de repository
     */

    public function PostAdminIdAction($id)

    {
      {


//      On récupère le contenu de l'Entity dans la variable repository
        $repository = $this->getDoctrine()->getRepository(Post::class);
//      on récupère l'article en fonction de l'id
        $post = $repository->find($id);
//      on récupère l'ensemble des articles
        $posts = $repository->findAll();
//      On récupère le contenu de l'Entity dans la variable repository
        $repository = $this->getDoctrine()->getRepository(LeShow::class);
        $leShows = $repository->findAll();
//      On récupère le contenu de l'Entity dans la variable repository
        $repository = $this->getDoctrine()->getRepository(LeEvent::class);
//      on récupère l'ensemble des articles
        $leEvents = $repository->findAll();
//      On récupère le contenu de l'Entity dans la variable repository
        $repository = $this->getDoctrine()->getRepository(Place::class);
//      on récupère l'ensemble des articles
        $places = $repository->findAll();


        return $this->render('@App/admin/Post.html.twig',
          [
            'post' => $post,
            'posts' => $posts,
            'leShows' => $leShows,
            'leEvents' => $leEvents,
            'places' => $places
          ]);
      }
    }
// ----------------------------------------------------------------
//CREATION D'ARTICLE
    /**
     * @Route("/admin/create_post", name="create_post")
     */

    public function formCreatePost(Request $request)

    {
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $posts = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Place::class);
      $places = $repository->findAll();


      /* Création d'un nouveau formulaire à partir d'un gabarit "LeShowType" */
      $form = $this->createForm(PostType::class, new Post);


      /* Associe les données envoyées (éventuellement) par le client via le formulaire à notre variable $form.
      Donc la variable $form contient maintenant aussi les données de $_POST*/
      $form->handleRequest($request);

      /* Si le formulaire est soumis */
      if ($form->isSubmitted()) {

        /* Si le formulaire respecte les contraintes */
        if ($form->isValid()) {
          /* Upload d'image*/
          /* Compteur pour concaténer le nom de chacune des 6 images sur le modèle :"nom . $i" (1 <= $i >= 6) */
          for ($i = 1; $i <= 5; $i++) {

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

          /* Je récupère l'entité manager de doctrine */
          $entityManager = $this->getDoctrine()->getManager();

          /* Je stocke temporairement les données dans l'unité de travail */
          $entityManager->persist($img);

          /* Je "pousse" les données dans la Bdd*/
          $entityManager->flush();


          /* J'affiche les messages flash confirmant l'enregistrement */
          $this->addFlash(
            'notice-icon',
            '<i class="flash-icon success fal fa-check"></i>'
          );
          $this->addFlash(
            'notice',
            '<h1 class="h1-flash">L\'article ou la page a été enregistré</h1>'
          );

//        /* Je redirige ensuite sur la page des articles */
          return $this->redirectToRoute('admin_posts');

        } else {
          /* Si les contraintes n'ont pas été respectées j'affice un message d'erreur */
          $this->addFlash(
            'error-icon',
            '<i class="flash-icon error fal fa-times"></i>'
          );
          $this->addFlash(
            'error',
            '<h1 class="h1-flash">L\'article ou la page n\'a pas été enregistré</h1>'
          );
        }
      }

      /* Quand j'arrive sur la route "create_show" je vais directement sur le formulaire dont les champs sont définis dans  LeShowType,
      et qui seront affichés grace à twig*/
      return $this->render('@App/admin/CreatePost.html.twig',
        [
          'formpost' => $form->createView(),
          'leShows' => $leShows,
          'leEvents' => $leEvents,
          'posts' => $posts,
          'places' => $places
        ]);
    }
    //--------------------------------------------------------------------------------------------------------------------------------------------
    //UPDATE Spectacle

    /**
     * @Route("/admin/update_post/{id}", name="admin_update_post")
     */
    public function UpdatePostAction(Request $request, $id)
    {

      // cherche un spectacle avec instance de getDoctrine -> méthode get Repository
      // puis ->find( spectacle )
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $posts = $repository->findAll();
      $post = $repository->find($id);
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Place::class);
      $places = $repository->findAll();


      for ($i = 1; $i <= 5; $i++) {

        $getter = 'getImg' . $i;
        $setter = 'setImg' . $i;

        $oldImages[$i] = $post->$getter();

        // tester si image existe, alors récupère entité piece puis ajoute attribut Image qui est un string

        if ($post->$getter()) {

          //redéfinit Image
          $post->$setter(
            new File($this->getParameter('upl_directory') . '/' . $post->$getter())
          );

        }

      }
      //recherche entité leShow existant, puis créé la forme
      $form = $this->createForm(PostType::class, $post);

      // associe les données envoyées (éventuellement) par le client via le formulaire
      //à notre variable $form. Donc la variable $form contient maintenant aussi $_POST
      //handlerequest reremplit le formulaire, récupère données et les reinjecte dans formulaire
      $form->handleRequest($request);
//      var_dump($form->getData()->getImg1());die;

      //isSubmitted vérifie si il y a bien un contenu form envoyé, puis on regarde si valide (à compléter plus tard)

      /* Si le formulaire est soumis */
      if ($form->isSubmitted()) {
        if ($form->isValid()) {
          $post = $form->getData();

          for ($i = 1; $i <= (5); $i++) {

            $getter = 'getImg' . $i;
            $setter = 'setImg' . $i;

//            $oldImages[$i] = $leShow->$getter();
//

            if ($post->$getter() !== NULL) {

              // créé file avec getImg . $i, récupère string chemin image

              $file = $post->$getter();

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


                $post->$setter(
                  $fileName
                );
              }
            } else {
              // si pas de changement on recupère l'ancien nom
              $post->$setter($oldImages[$i]);

            }

          }

          // je récupère l'entity manager de doctrine
          $entityManager = $this->getDoctrine()->getManager();


          // j'enregistre en base de donnée, persist met dans zone tampon provisoire de l'unité de travail
          $entityManager->persist($post);
          //mise à jour BD, envoy à bd
          $entityManager->flush();

          // Renvoi de confirmation d'enregistrement Message flash
          $this->addFlash(
            'notice-icon',
            '<i class="flash-icon success fal fa-check"></i>'
          );
          $this->addFlash(
            'notice',
            'Votre article a bien été modifié!'
          );

          return $this->redirectToRoute('admin_shows');
        } else {
          $this->addFlash(
            'error-icon',
            '<i class="flash-icon error fal fa-times"></i>'
          );
          $this->addFlash(
            'notice',
            'Votre article n\'a pas été modifié!'
          );
        }
      }


      return $this->render(
        '@App/admin/CreatePost.html.twig',
        [
          'formpost' => $form->createView(),
          'posts' => $posts,
          'post' => $post,
          'leShows' => $leShows,
          'leEvents' => $leEvents,
          'places' => $places
        ]
      );
    }

    //--------------------------------------------------------------------------------------------------------------------------------------------
    //Delete Article

    /**
     * @Route("/admin/delete_place/{id}", name="admin_delete_place")
     * Suppression d'un livre
     */
    public function supprLeShowAction($id)
    {
      //je sélectionne les Entités dont j'ai besoin
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $posts = $repository->findAll();
      //je sélectionne l'id de mon objet

      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Place::class);
      $places = $repository->findAll();
      //je recupère l'entity manager de doctrine pour avoir la fonction "remove"
      $entityManager = $this->getDoctrine()->getManager();
      //je sélectionne l'id de mon objet
      $post = $repository->find($id);
      $entityManager->remove($post);
      $entityManager->flush();
      $this->addFlash(
        'notice-icon',
        '<i class="flash-icon success fal fa-check"></i>'
      );
      $this->addFlash(

        'notice',
        'Le spectacle a été supprimé'
      );
      return $this->redirectToRoute('admin_posts',
        [

          'leShows' => $leShows,
          'posts' => $posts,
          'leEvents' => $leEvents,
          'places' => $places,
//
        ]);
    }
  }
