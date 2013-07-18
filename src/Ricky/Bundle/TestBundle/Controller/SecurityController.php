<?php

namespace Ricky\Bundle\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SecurityController extends Controller
{

    /**
     * @Route("/secured", name="_my_secured_index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/demo/secured/test")
     * @Route("/secured/test1", name="_my_secured_test1")
     * @Template()
     */
    public function testAction()
    {
        return array();
    }

    /**
     * @Route("/secured/logout", name="_my_secured_logout")
     */
    public function logoutAction()
    {
    }

    /**
     * @Route("/secured/check", name="_my_secured_check")
     */
    public function checkAction()
    {
    }

    /**
     * @Route("/secured/login", name="_my_secured_login")
     * @Template()
     */
    public function loginAction(Request $request)
    {
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $request->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return array(
            'last_username' => $request->getSession()->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        );
    }

}

