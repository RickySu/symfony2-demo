<?php

namespace Ricky\Bundle\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ricky\Bundle\TestBundle\Entity;

/**
 * @Route("/validation")
 */
class ValidationController extends Controller
{

    /**
     * @Route("/test1")
     * @Template()
     */
    public function test1Action()
    {
        $category = new Entity\Category();
        $validator = $this->get('validator');
        $errors = $validator->validate($category);
        return array('errors' => $errors);
    }

}

