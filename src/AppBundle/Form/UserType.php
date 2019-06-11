<?php


  namespace AppBundle\Form;
  use AppBundle\Entity\User;
  use Symfony\Component\OptionsResolver\OptionsResolver;
  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\Extension\Core\Type\FileType;
  use Symfony\Component\Form\Extension\Core\Type\EmailType;
  use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
  use Symfony\Component\Form\Extension\Core\Type\PasswordType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\Form\FormBuilderInterface;





  class UserType extends AbstractType
  {
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder

          /*->add('img_alt')
          ->add('img', FileType::class, [
              'data_class' => null,
              'label' => 'avatar (jpg, png)'
            ]
          )*/
        ->add('username')
        ->add('email', EmailType::class)
        ->add('plainPassword', RepeatedType::class, array(
          'type' => PasswordType::class,
          'options' => array(
            'translation_domain' => 'FOSUserBundle',
            'attr' => array(
              'autocomplete' => 'new-password',
            ),
          ),
          'first_options' => array('label' => 'form.password'),
          'second_options' => array('label' => 'form.password_confirmation'),
          'invalid_message' => 'fos_user.password.mismatch',
        ))
        ->add('submit', SubmitType::class)
      ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
      $resolver->setDefaults(array(
        'data_class' => User::class,
      ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
      return 'appbundle_user';
    }


  }