<?php
namespace ITViet\SiteBundle\Form\Types;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use ITViet\SiteBundle\Form\Choices;
use Doctrine\ORM\EntityRepository;

class ArticleNewType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options){
       $builder
           ->add('title')
           ->add('content', 'textarea', array('required' => false))
           ->add('isActive', 'choice', array(
             'choices' => Choices::$published,
             'required' => true,
             'multiple' => false,
             'error_bubbling' => true,
           ));
    }
    public function getName(){
      return 'article';
    }
}
