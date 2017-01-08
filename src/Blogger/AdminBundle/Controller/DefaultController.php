<?php

namespace Blogger\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/admin/")
     */
    public function indexAction()
    {
        return $this->render('BloggerAdminBundle:Default:index.html.twig', ['param' => $this->container->getParameter('adminpass')]);
    }
}
