<?php
namespace Ricky\Bundle\TestBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints;

class TestFileType extends AbstractType
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
            ->add('photo','file',array(
                'label' => '照片',
                'constraints' => array(
                    new Constraints\Image(array(
                        'mimeTypes'        => 'image/jpeg',
                        'mimeTypesMessage' => '只允許 jpg 格式',
                        'maxWidth' => 1024,
                        'maxHeight' => 768,
                    )),
                ),
            ))
            ->add('submit','submit');
    }

    public function getName() {
        return 'testfile';
    }

}
