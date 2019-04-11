<?php

namespace AssocBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, array('attr' => array('placeholder' => 'Le titre de l\'article', 'class' => 'form-control')))
            ->add('auteur', TextType::class, array('attr' => array('placeholder' => 'L\'auteur de l\'article', 'class' => 'form-control')))
            ->add('corps', TextareaType::class, array('attr' => array('placeholder' => 'Le corps de l\'article', 'class' => 'form-control', 'rows'=>'5')))
            ->add('date', DateType::class, array('attr' => array('placeholder' => 'La date de l\'article', 'class' => 'form-control')))
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
