<?php

namespace AssocBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class MessageType extends AbstractType
{
    /**
     * Définition des champs du formulaire de contact qui sera affiché dans la vue
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array('attr'=>array('placeholder'=>'Votre nom', 'name'=>'nom', 'class'=>'form-control', 'value'=>'')))
            ->add('prenom', TextType::class, array('attr'=>array('placeholder'=>'Votre prénom', 'name'=>'prenom', 'class'=>'form-control', 'value'=>'')))
            ->add('email', EmailType::class, array('required'=>true, 'attr'=>array('placeholder'=>'Votre email', 'name'=>'email', 'class'=>'form-control', 'value'=>'')))
            ->add('corps', TextareaType::class, array('required'=>true, 'attr'=>array('placeholder'=>'Votre message', 'name'=>'corps', 'class'=>'form-control', 'rows'=>'5', 'value'=>'')))
            ->add('Membre', HiddenType::class, array('attr'=>array('class'=>'form-control', 'name'=>'membre', 'value'=>'')))
            ->add('Envoyer', SubmitType::class, array('attr'=>array('class'=>'btn btn-primary', 'value'=>'Envoyer', 'name'=>'envoyer')))
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
