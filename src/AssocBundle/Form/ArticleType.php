<?php

namespace AssocBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    /**
     * Construction du formulaire de création d'articles
     * 
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, array('attr' => array('placeholder' => 'Le titre de l\'article', 'name' => 'titre', 'class' => 'form-control', 'value' => '')))
            ->add('corps', TextareaType::class, array('attr' => array('placeholder' => 'Le corps de l\'article', 'name' => 'corps', 'class' => 'form-control', 'rows' => '5', 'value' => '')))
            ->add('auteur', TextType::class, array('attr' => array('placeholder' => 'L\'auteur de l\'article', 'name' => 'auteur', 'class' => 'form-control', 'value' => '')))
            ->add('date', DateTimeType::class, array('attr' => array('placeholder' => 'La date de l\'article', 'name' => 'date', 'class' => 'form-control')))
            ->add('photo', FileType:: class, array('attr' => array('placeholder' => 'La photo de l\'article', 'label' => 'photo', 'class' => 'form-control')))
            ->add('lettre', TextType::class, array('attr' => array('placeholder' => 'La lettre d\'information rattachée à l\'article', 'name' => 'lettre d\'informations', 'class' => 'form-control')))
            ->add('Creer un article', SubmitType::class, array('attr' => array( 'value' => 'Créer un article', 'class' => 'btn btn-primary')))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AssocBundle\Entity\Article',
        ));
    }
}
