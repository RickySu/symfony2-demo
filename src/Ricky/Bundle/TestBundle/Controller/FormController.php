<?php

namespace Ricky\Bundle\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\HttpFoundation\Response;
use Ricky\Bundle\TestBundle\Entity;
use Ricky\Bundle\TestBundle\Form\Type as FormType;

/**
 * @Route("/form")
 */
class FormController extends Controller
{

    /**
     * @Route("/test1")
     * @Template()
     */
    public function test1Action()
    {
        $form = $this->createFormBuilder()
            ->add('name', 'text')
            ->add('email', 'email')
            ->add('save', 'submit')
            ->getForm();
        return array('form' => $form->createView());
    }

    /**
     * @Route("/test2")
     * @Template()
     */
    public function test2Action()
    {
        $form = $this->createFormBuilder()
            ->add('name', 'text')
            ->add('email', 'email')
            ->add('phone', 'text',array(
                'label' => '您的電話',
                'constraints' => array(
                     new Constraints\Regex(array(
                         'pattern' => '/\d+/i',
                         'message' => '格式錯誤',
                     )),
                )
            ))
            ->add('save', 'submit')
            ->getForm();
        $form->handleRequest($this->getRequest());  //處理 post
        if($form->isValid()){         //驗證表單
            return new Response("ok");
        }
        return array('form' => $form->createView());
    }


    /**
     * @Route("/test3")
     * @Template()
     */
    public function test3Action()
    {
        $category = new Entity\Category();
        $form = $this->createFormBuilder($category)
            ->add('name', 'text')
            ->add('save', 'submit')
            ->getForm();
        $form->handleRequest($this->getRequest());  //處理 post
        if($form->isValid()){         //驗證表單
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return new Response("ok");
        }
        return array('form' => $form->createView());
    }

    /**
     * @Route("/test4")
     * @Template()
     */
    public function test4Action()
    {
        $form = $this->createFormBuilder()
            ->add('name', 'text')
            ->add('email', 'email')
            ->add('phone', 'text',array(
                'label' => '您的電話',
                'constraints' => array(
                     new Constraints\Regex(array(
                         'pattern' => '/\d+/i',
                         'message' => '格式錯誤',
                     )),
                )
            ))
            ->getForm();
        $form->handleRequest($this->getRequest());  //處理 post
        if($form->isValid()){         //驗證表單
            return new Response("ok");
        }
        return array('form' => $form->createView());
    }

    /**
     * @Route("/test5")
     * @Template()
     */
    public function test5Action()
    {
        $form = $this->createForm(new FormType\TestType());
        $form->handleRequest($this->getRequest());  //處理 post
        if($form->isValid()){         //驗證表單
            return new Response("ok");
        }
        return array('form' => $form->createView());
    }
    
}
