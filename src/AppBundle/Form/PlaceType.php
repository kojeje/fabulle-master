<?php

//NameSpace
  namespace AppBundle\Form;

//Se réfère à l'entité:
  use AppBundle\Entity\Place;
//active des classes symfony utilisé
  use Symfony\Component\Form\Extension\Core\Type\EmailType;
  use Symfony\Component\Form\Extension\Core\Type\TelType;
  use Symfony\Component\OptionsResolver\OptionsResolver;
  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\Form\FormBuilderInterface;
  use Symfony\Component\Form\Extension\Core\Type\CountryType;
  use Symfony\Component\Form\Extension\Core\Type\UrlType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;

// Classe de formulaire
  class PlaceType extends AbstractType
  {
//  Méthode de construction de formulaire
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
//      Champ text
        ->add('name')
//      Champ textarea
        ->add('presentation',TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '10',
              'cols' => '24'
            ]
          ]
        )
//      Champ text
        ->add('ad1')
//      Champ text
        ->add('ad2')
//      Champ integer
        ->add('cp')
//      Champ text
        ->add('commune')
//      Champ de sélection de pays
        ->add('country',CountryType::class,[
        // Choix par défaut
          'preferred_choices' => ['FR', 'France']])
//      Champ n°de tel
        ->add('tel',TelType::class)
//      Champ Url
        ->add('site',UrlType::class)
//      Champ email
        ->add('email',EmailType::class)
//      Champ text
        ->add('gmap')
//      Bouton submit
        ->add('submit', SubmitType::class)
      ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
      $resolver->setDefaults(array(
        'data_class' => Place::class,
      ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
      return 'appbundle_place';
    }
  }