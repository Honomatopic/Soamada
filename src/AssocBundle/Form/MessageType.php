<?php

namespace AssocBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MessageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array('attr'=>array('placeholder'=>'Votre nom', 'class'=>'form-control')))
            ->add('prenom', TextType::class, array('attr'=>array('placeholder'=>'Votre prénom', 'class'=>'form-control')))
            ->add('email', TextType::class, array('required'=>true, 'attr'=>array('placeholder'=>'Votre email', 'class'=>'form-control')))
            ->add('corps', TextareaType::class, array('required'=>true, 'attr'=>array('placeholder'=>'Votre message', 'class'=>'form-control')))
            ->add('Membre', HiddenType::class, array('attr'=>array('class'=>'form-control')))
            ->add('Envoyer', SubmitType::class, array('attr'=>array('class'=>'btn btn-primary', 'value'=>'Envoyer')))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AssocBundle\Entity\Message'
        ));
    }
}
