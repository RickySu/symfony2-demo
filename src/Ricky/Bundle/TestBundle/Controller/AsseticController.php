<?php

namespace Ricky\Bundle\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ricky\Bundle\TestBundle\Entity;

/**
 * @Route("/assetic")
 */
class AsseticController extends Controller
{
    /**
     * @Route("/test")
     * @Template()
     */
    public function testAction()
    {
        return array();
    }

    /**
     * @Route("/test2")
     * @Template()
     */
    public function test2Action()
    {
        return array();
    }

}
