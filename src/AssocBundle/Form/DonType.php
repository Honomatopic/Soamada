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
                ->add('nom', TextType::class, array('attr' => array('placeholder' => 'Votre nom', 'class' => 'form-control', 'value' => '')))
                ->add('prenom', TextType::class, array('attr' => array('placeholder' => 'Votre prénom', 'class' => 'form-control', 'value' => '')))
                ->add('email', EmailType::class, array('attr' => array('placeholder' => 'Votre email', 'class' => 'form-control', 'value' => '')))
                ->add('adresse', TextType::class, array('attr' => array('placeholder' => 'Votre adresse', 'class' => 'form-control', 'value' => '')))
                ->add('cp', TextType::class, array('attr' => array('placeholder' => 'Votre code postal', 'class' => 'form-control', 'value' => '')))
                ->add('ville', TextType::class, array('attr' => array('placeholder' => 'Votre ville d\'habitation', 'class' => 'form-control', 'value' => '')))
                ->add('tel', TextType::class, array('attr' => array('placeholder' => 'Votre téléphone', 'class' => 'form-control', 'value' => '')))
                ->add('montant', MoneyType::class, array('attr' => array('placeholder' => 'Votre montant', 'class' => 'form-control', 'value' => '')))
                ->add('moyen', ChoiceType::class, array(
                    'choices' => array('cb' => 'Carte bleue', 'visa' => 'Carte visa', 'paypal' => 'Paypal', 'cheque' => 'Chèque'),
                    'expanded' => true,
                    'multiple' => false))
                /* ->add('visa', RadioType::class, array('label_attr' => array('value' => 'carte visa')))
                  ->add('paypal', RadioType::class, array('label_attr' => array('value' => 'paypal')))
                  ->add('cheque', RadioType::class, array('label_attr' => array('value' => 'cheque'))) */
                ->add('Valider', SubmitType::class, array('attr' => array('class' => 'btn btn-primary', 'value' => 'Valider')))
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
