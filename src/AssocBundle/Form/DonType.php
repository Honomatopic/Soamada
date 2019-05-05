<?php

namespace AssocBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class DonType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
          
        $builder
                ->add('nom', TextType::class)
                ->add('prenom', TextType::class)
                ->add('email', TextType::class)
                ->add('adresse', TextType::class)
                ->add('cp', TextType::class)
                ->add('ville', TextType::class)
                ->add('tel', TextType::class)
                ->add('montant', MoneyType::class)
                ->add('moyen', ChoiceType::class, [
                    'choices' => array('Carte bancaire' => 'CB', 'Chèque' => 'Chèque', 'Paypal'  => 'Paypal'),
                    'expanded' => true, // => boutons
                    'required' => true
        ]);
        
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
