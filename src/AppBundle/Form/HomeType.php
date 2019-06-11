<?php

  namespace AppBundle\Form;

  use AppBundle\Entity\Post;
  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\FormBuilderInterface;
  use Symfony\Component\Form\Extension\Core\Type\FileType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\OptionsResolver\OptionsResolver;



  class HomeType extends AbstractType
  {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder


// CORPS DE L'ARTICLE


// titre du spectacle
        ->add('titre')
// texte principal/ description
        ->add('text1', TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '10',
              'cols' => '24'
            ]
          ]
        )
// image principale (affiche, logo)
        ->add('img1', FileType::class, [
            'data_class' => null,


          ]
        )
// image alt
        ->add('img_alt1')
        ->add('img_title1')

//--------------------------------------------------------------------

        // SLIDER

//--------------------------------------------------------------------
// Images du slider

      // nom du fichier
        ->add('img2', FileType::class, [
            'data_class' => null,
          ]
        )
      // alt
        ->add('img_alt2')
      // nom du fichier
        ->add('img3', FileType::class, [
            'data_class' => null,
          ]
        )
      // alt
        ->add('img_alt3')

      // nom du fichier
        ->add('img4', FileType::class, [
            'data_class' => null,
          ]
        )
      // alt
        ->add('img_alt4')
      // nom du fichier
        ->add('img5', FileType::class, [
            'data_class' => null,
          ]
        )
      // alt
        ->add('img_alt5')

      // Textes du slider
        ->add('sl_caption')

//--------------------------------------------------------------------
// Video
    // code d'intégration
        ->add('youtube')
//--------------------------------------------------------------------


      // Submit
        ->add('submit', SubmitType::class)
      ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
      $resolver->setDefaults(array(
        'data_class' => Post::class,
      ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
      return 'appbundle_home';
    }
  }