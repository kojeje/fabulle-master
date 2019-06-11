<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard*
   */
  namespace AppBundle\Controller;

  use AppBundle\Form\ContactType;
  use AppBundle\Entity\LeEvent;
  use AppBundle\Entity\Post;
  use AppBundle\Entity\Place;
  use AppBundle\Entity\LeShow;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\Routing\Annotation\Route;
//  use AppBundle\Repository\PlaceRepository;
  use Symfony\Component\HttpFoundation\Request; // Handle the request in the controller
  use ReCaptcha\ReCaptcha; // Include the recaptcha lib


  class DefaultController extends Controller{

    /**
     * @Route("/", name="home")
     */
    public function HomeidAction()
    {

      $repository = $this->getDoctrine()->getRepository(Post::class);
      $post = $repository->find(1);
      $posts = $repository->findAll();

      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Place::class);
      $places = $repository->findAll();


      return $this->render('@App/pages/home.html.twig',
        [
          'post' => $post,
          'leShows' => $leShows,
          'leEvents' => $leEvents,
          'posts' => $posts,
          'places' => $places,
        ]);


    }


    //-----------------------------------------------------------------------------------------
    // Afficher PAGE "La Cie"
    /**
     * @Route("/admin/cie", name="admin_cie_id")
     */

    public function AdminCieIdAction()
    {
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $cie = $repository->find(2);
      $posts =$repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Place::class);
      $places = $repository->findAll();





      return $this->render('@App/admin/home.html.twig',
        [
          'leShows' => $leShows,
          'leEvents' => $leEvents,
          'posts' => $posts,
          'places' => $places,
          'cie' => $cie
        ]);


    }
    // Afficher tous les spectacles

    /**
     * @Route("/shows", name="shows")
     */
    public function listShowsAction()
    {
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $posts = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Place::class);
      $places = $repository->findAll();



      return $this->render('@App/pages/shows.html.twig',
        [
          'leShows' => $leShows,
          'leEvents' => $leEvents,
          'posts' => $posts,
          'places' => $places

        ]);
    }
    // Afficher un spectacle en fonction de l'id
    /**
     * @Route("/show/{id}", name="show_id")
     * Je récupère une instance de Doctrine qui appelle une instense de repository
     */

    public function AdminShowIdAction($id)

    {
//    On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
//    on récupère l'article en fonction de l'id
      $leShow = $repository->find($id);
//    on récupère l'ensemble des articles
      $leShows = $repository->findAll();

//    On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
//      on récupère l'ensemble des articles
      $leEvents = $repository->findAll();

//    On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(Post::class);
//    on récupère l'ensemble des articles
      $posts = $repository->findAll();


//      On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(Place::class);
//      on récupère l'ensemble des articles
      $places = $repository->findAll();

      return $this->render('@App/pages/show.html.twig',
        [
          'leShows' => $leShows,
          'leShow' => $leShow,
          'posts' => $posts,
          'leEvents' => $leEvents,
          'places' => $places

        ]);

  }


  // Afficher tous les évènements

  /**
   * @Route("/events", name="events")
   */
  public function listEventsAction()
  {
    $repository = $this->getDoctrine()->getRepository(LeShow::class);
    $leShows = $repository->findAll();
    $repository = $this->getDoctrine()->getRepository(LeEvent::class);
    $leEvents = $repository->findAll();
    $repository = $this->getDoctrine()->getRepository(Post::class);
    $posts = $repository->findAll();
    $repository = $this->getDoctrine()->getRepository(Place::class);
    $places = $repository->findAll();



    return $this->render('@App/pages/events.html.twig',
      [
        'leShows' => $leShows,
        'leEvents' => $leEvents,
        'posts' => $posts,
        'places' => $places

      ]);
  }
    // Afficher un évènement en fonction de l'id
    /**
     * @Route("/event/{id}", name="event_id")
     * Je récupère une instance de Doctrine qui appelle une instense de repository
     */

    public function  EventIdAction($id)

    {
//    On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
//    on récupère l'ensemble des articles
      $leShows = $repository->findAll();

//      On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(Place::class);
//      on récupère l'ensemble des articles
      $places = $repository->findAll();

//    On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
//    récupère l'article en fonction de l'id
      $leEvent = $repository->find($id);

//      on récupère l'ensemble des articles
      $leEvents = $repository->findAll();
//




      return $this->render('@App/pages/event.html.twig',
        [
          'leShows' => $leShows,
          'leEvent' => $leEvent,
          'leEvents' => $leEvents,
          'places' => $places

        ]);

    }
    /**
     * @Route("/places", name="places")
     */
    public function listPlacesAction()
    {
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $posts = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Place::class);
      $places = $repository->findAll();



      return $this->render('@App/pages/places.html.twig',
        [
          'leShows' => $leShows,
          'leEvents' => $leEvents,
          'posts' => $posts,
          'places' => $places,


        ]);
    }
    // Afficher un évènement en fonction de l'id
    /**
     * @Route("/place/{id}", name="place_id")
     * Je récupère une instance de Doctrine qui appelle une instense de repository
     */

    public function   PlaceIdAction($id)

    {
//    On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
//    on récupère l'ensemble des articles
      $leShows = $repository->findAll();

//    On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
//      on récupère l'ensemble des articles
      $leEvents = $repository->findAll();
//

//    On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(Post::class);
//    on récupère l'ensemble des articles
      $posts = $repository->findAll();


//      On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(Place::class);
//      on récupère l'ensemble des articles
      $places = $repository->findAll();
//    on récupère l'article en fonction de l'id
      $place = $repository->find($id);

      return $this->render('@App/pages/place.html.twig',
        [
          'leShows' => $leShows,
          'place' => $place,
          'posts' => $posts,
          'leEvents' => $leEvents,
          'places' => $places

        ]);

    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $posts = $repository->findAll();


      // Create the form according to the FormType created previously.
      // And give the proper parameters
      $form = $this->createForm(ContactType::class,null,array(
        // To set the action use $this->generateUrl('route_identifier')
        'action' => $this->generateUrl('myapplication_contact'),
        'method' => 'POST'
      ));

      if ($request->isMethod('POST')) {
        // Refill the fields in case the form is not valid.
        $form->handleRequest($request);

        if($form->isValid()){
          // Send mail
          if($this->sendEmail($form->getData())){

            // Everything OK, redirect to wherever you want ! :

            return $this->redirectToRoute('contact_success');
          } else {
            // An error ocurred, handle
            var_dump("Errooooor :(");
          }
        }
      }

      return $this->render('@App/pages/contact.html.twig', array(
        'form' => $form->createView(),
        'posts' => $posts,
        'leShows' => $leShows,
        'leEvents' => $leEvents
      ));
    }

    private function sendEmail($data){
      $myappContactMail = 'contact@kojeje.fr';
      $myappContactPassword = 'Kestufe12';

      // In this case we'll use the ZOHO mail services.
      // If your service is another, then read the following article to know which smpt code to use and which port
      // http://ourcodeworld.com/articles/read/14/swiftmailer-send-mails-from-php-easily-and-effortlessly
      $transport = \Swift_SmtpTransport::newInstance('ssl0.ovh.net', 465,'ssl')
        ->setUsername($myappContactMail)
        ->setPassword($myappContactPassword);

      $mailer = \Swift_Mailer::newInstance($transport);

      $message = \Swift_Message::newInstance($data["subject"])
        ->setFrom(array($myappContactMail => $data["name"]))
        ->setTo(array(
          $myappContactMail => $myappContactMail
        ))
        ->setBody($data["message"]."ContactMail :".$data["email"]);

      return $mailer->send($message);


    }
    /**
     * @Route("/contact_success", name="contact_success")
     */

    public function ContactSuccessAction ()
    {

      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $posts = $repository->findAll();

      return $this->render("@App/pages/contact_success.html.twig",
        [
          'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
          'posts' => $posts,
          'leShows' => $leShows,
          'leEvents' => $leEvents
        ]);

    }
    /**
     * @Route("/result", name="result")
     */
    public function listLeEventByPlaceCPAction(Request $request){


      // je genère le Repository de Doctrine

      $placeRepository = $this->getDoctrine()->getRepository(Place::class);

      /** @var $placeRepository PlaceRepository */ // je génère une requête par code postal via un formulaire
      $cp = $request->query->get('cp');

//    On va chercher la méthode de Repository qui contient la requête
      $places = $placeRepository->getLeEventByPlace($cp);




        //retourne la page html spectacles en utilisant le twig events by cp
      return $this->render("@App/pages/events-by-cp.html.twig",
        [ 'cp' => $cp,
          'places' => $places,
//


        ]);
    }


  }
