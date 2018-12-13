<?php

namespace SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use SiteBundle\Form\ImageType;

class PostType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, ['required' => false])
                ->add('content', TextareaType::class, ['required' => false])
                ->add('active', CheckboxType::class, ['required' => false])
                ->add('slug', TextType::class, ['required' => false])
                ->add('image', ImageType::class)
                ->add('author', EntityType::class, [
                    'class' => 'SiteBundle\Entity\Author',
                    'choice_label' => 'lastName'
                ])
                ->add('categories', EntityType::class, [
                    'required' => false,
                    'class' => 'SiteBundle\Entity\Category',
                    'choice_label' => 'name',
                    'multiple' => true
                ])
                ->add('save', SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SiteBundle\Entity\Post'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sitebundle_post';
    }


}
