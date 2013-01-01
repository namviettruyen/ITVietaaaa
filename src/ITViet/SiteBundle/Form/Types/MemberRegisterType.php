<?php
namespace ITViet\SiteBundle\Form\Types;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use ITViet\SiteBundle\Form\Choices;
use Doctrine\ORM\EntityRepository;

class MemberRegisterType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $year = array();
        for($y = date('Y'); $y >= date('Y') - 70; $y--)  //this year and three years ago
          $year[$y] = $y;

        $builder
          ->add('fullName', 'text')
          ->add('address', 'text')
          ->add('agreeWithTnC', 'checkbox', array('property_path' => false))
          ->add('upimage', 'file', array('required' => false))
          ->add('gender', 'choice', array(
              'choices' => Choices::$gender,
              'required' => true,
              'multiple' => false,
              'empty_value' => '...',
              'error_bubbling' => true,
          ))
          ->add('birthDate', 'date', array(
              'input' => 'datetime',
              'required' => true,
              'widget' => 'choice',
              'format' => 'dd-MM-yyyy',
              'empty_value' => array('day' => 'Day', 'month' => 'Month', 'year' => 'Year'),
              'years' => $year,
          ))
          ->add('email', 'email')
          ->add('password', 'password')
          ->add('retypePassword', 'password', array('property_path' => false));
    }
    public function getName(){
      return 'member';
    }
}
