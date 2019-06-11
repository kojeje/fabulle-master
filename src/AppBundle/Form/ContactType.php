<?php
// your-path-to-types/ContactType.php

    namespace AppBundle\Form;

    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\CountryType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\DateType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\EmailType;
    use Symfony\Component\Form\Extension\Core\Type\TelType;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
    use Symfony\Component\Form\Extension\Core\Type\IntegerType;
//    use Symfony\Component\Form\Extension\Core\Type\FileType;
    use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
    use Symfony\Component\Validator\Constraints\Email;
    use Symfony\Component\Validator\Constraints\NotBlank;

    class ContactType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
              // Champs texte
              ->add('name', TextType::class, array('attr' => array('placeholder' => 'nom'),
                //Contrainte
                'constraints' => array(
                  new NotBlank(array("message" => "Veuillez renseigner votre nom")),
                )
              ))
              // Email
                ->add('email', EmailType::class,
                array(
                  //attributs
                  'attr' => array(
                    //placeholder
                    'placeholder' => 'email'
                  ),
                  //Contrainte
                    'constraints' => array(
                        new NotBlank(array(
                          "message" => "Merci de renseigner votre adresse email")),
                        new Email(array(
                          "message" => "l'adresse email saisie semble invalide")),
                    )
                ))
// ------------------------------------------------------------------------------
//      Message
//      -------------------------------------------------------------------------
              // Champ texte
              ->add('subject', TextType::class,
                array(
                  'attr' => array(
                    'placeholder' => 'Objet du message'
                  ),
                  'constraints' => array(
                  new NotBlank(array(
                    "message" => "Merci saisir le sujet de votre message")),
                )
              ))
              // Corps du message (textarea)
                ->add('message', TextareaType::class,
                    array(
                        'attr' => array(
                          'placeholder' => 'message'),
                        'constraints' => array(
                            new NotBlank(array(
                              "message" => "Merci de saisir un message"))
                        )
                    )
                );
//
        }

        public function setDefaultOptions(OptionsResolver $resolver)
        {
            $resolver->setDefaults(array(
                'error_bubbling' => true
            ));
        }

        public function getName()
        {
            return 'contact_form';
        }
    }