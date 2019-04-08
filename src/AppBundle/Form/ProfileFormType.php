<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Form;

use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class ProfileFormType extends AbstractType
{

    /**
     * @var string
     */
    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildUserForm($builder, $options);

        $constraintsOptions = array(
            'message' => 'fos_user.current_password.invalid',
        );

        if (!empty($options['validation_groups'])) {
            $constraintsOptions['groups'] = array(reset($options['validation_groups']));
        }

        $builder->add('current_password', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'), array(
            'label' => 'form.current_password',
            'translation_domain' => 'FOSUserBundle',
            'mapped' => false,
            'constraints' => new UserPassword($constraintsOptions),
        ));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'csrf_token_id' => 'profile',
            // BC for SF < 2.8
            'intention' => 'profile',
        ));
    }

    // BC for SF < 3.0
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'fos_user_profile';
    }

    /**
     * Builds the embedded form representing the user.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    protected function buildUserForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'), array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('nom', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\TextType'), array('attr' => array('label' => 'form.nom', 'translation_domain' => 'FOSUserBundle', 'placeholder' => 'Votre nom', 'class' => 'form-control')))
            ->add('prenom', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\TextType'), array('attr' => array('label' => 'form.prenom', 'translation_domain' => 'FOSUserBundle', 'placeholder' => 'Votre prénom', 'class' => 'form-control')))
            ->add('adresse', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\TextType'), array('attr' => array('label' => 'form.adresse', 'translation_domain' => 'FOSUserBundle', 'placeholder' => 'Votre adresse', 'class' => 'form-control')))
            ->add('cp', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\TextType'), array('attr' => array('label' => 'form.cp', 'translation_domain' => 'FOSUserBundle', 'placeholder' => 'Votre code postal', 'class' => 'form-control')))
            ->add('ville', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\TextType'), array('attr' => array('label' => 'form.ville', 'translation_domain' => 'FOSUserBundle', 'placeholder' => 'Votre ville', 'class' => 'form-control')))
            ->add('tel', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\TextType'), array('attr' => array('label' => 'form.tel', 'translation_domain' => 'FOSUserBundle', 'placeholder' => 'Votre téléphone', 'class' => 'form-control')))

        ;
    }
}