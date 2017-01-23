<?php
/**
 * Created by PhpStorm.
 * User: Norbi
 * Date: 2017. 01. 07.
 * Time: 13:02
 */

namespace Blogger\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    /**
     * @Route("/admin/", name="login")
     */
    public function loginDefault(Request $request)
    {
        return $this->render('BloggerAdminBundle:Default:index.html.twig', array('param' => 'beléptető'));
    }

    /**
     * @Route("/admin/loginsuccess", name="loginsuccess")
     */
    public function loginSuccess(Request $request)
    {
        return $this->render('BloggerAdminBundle:Default:dashboard.html.twig', array('username' => $this->getUser()));
    }

    /**
     * @Route("/admin/loginfailure", name="loginfailure")
     */
    public function loginFailure(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        return $this->render('BloggerAdminBundle:Default:index.html.twig', array('param' => $error));
    }
}