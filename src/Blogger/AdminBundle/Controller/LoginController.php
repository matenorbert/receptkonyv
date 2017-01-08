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
use Blogger\AdminBundle\Entity as Entity;

class LoginController extends Controller
{
    /**
     * @Route("/admin/login", name="login")
     * @Method("POST")
     */
    public function validateAction(Request $request)
    {
        $username = $request->request->get('username');
        $pass = $request->request->get('userpass');
        $token = $request->request->get('_validation_number');

        if($token !== $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue())
        {
            return $this->render('BloggerAdminBundle:Default:index.html.twig', array('param' => 'Token hiba'));
        }

        $admin = new Entity\Admin();
        $admin->setUserName($username);
        $admin->setUserPass($pass);

        $validator = $this->container->get('validator');
        $errors = $validator->validate($admin);

        if(count($errors) > 0)
        {
            $msg = null;
            foreach($errors as $key => $val)
            {
                $msg .= $errors[$key]->getMessage();
            }

            return $this->render('BloggerAdminBundle:Default:index.html.twig', array('param' => 'hiba van: ' . $msg));
        }
        else
        {
            return $this->render('BloggerAdminBundle:Default:index.html.twig', array('param' => 'nincshiba: ' . $username . $pass));
        }
    }
}