<?php
namespace Ricky\Bundle\TestBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints;

class TestType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')
            ->add('email', 'email')
            ->add('phone', 'text',array(
                'label' => '您的電話',
                'constraints' => array(
                     new Constraints\Regex(array(
                         'pattern' => '/\d+/i',
                         'message' => '格式錯誤',
                     )),
                )))
            ->add('submit','submit');
    }

    public function getName() {
        return 'test';
    }
    
}
