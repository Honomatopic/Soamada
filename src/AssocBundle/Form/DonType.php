<?php

namespace AssocBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class DonType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nom', TextType::class, array('attr' => array('placeholder' => 'Votre nom', 'name' => 'nom', 'class' => 'form-control', 'value' => '')))
                ->add('prenom', TextType::class, array('attr' => array('placeholder' => 'Votre prénom', 'name' => 'prenom', 'class' => 'form-control', 'value' => '')))
                ->add('email', EmailType::class, array('attr' => array('placeholder' => 'Votre email', 'name' => 'email', 'class' => 'form-control', 'value' => '')))
                ->add('adresse', TextType::class, array('attr' => array('placeholder' => 'Votre adresse', 'name' => 'adresse', 'class' => 'form-control', 'value' => '')))
                ->add('cp', TextType::class, array('attr' => array('placeholder' => 'Votre code postal', 'name' => 'cp', 'class' => 'form-control', 'value' => '')))
                ->add('ville', TextType::class, array('attr' => array('placeholder' => 'Votre ville d\'habitation', 'name' => 'ville', 'class' => 'form-control', 'value' => '')))
                ->add('tel', TextType::class, array('attr' => array('placeholder' => 'Votre téléphone', 'name' => 'téléphone', 'class' => 'form-control', 'value' => '')))
                ->add('montant', MoneyType::class, array('attr' => array('placeholder' => 'Votre montant de donation', 'name' => 'montant', 'class' => 'form-control', 'value' => '')))
                ->add('moyen', RadioType::class, array('label_attr' => array('value' => 'carte bleue', 'value' => 'carte visa', 'value' => 'paypal', 'value' => 'chèque')))
                ->add('Valider', SubmitType::class, array('attr' => array('class' => 'btn btn-primary', 'value' => 'Valider', 'name' => 'valider')))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AssocBundle\Entity\Don'
        ));
    }

}
