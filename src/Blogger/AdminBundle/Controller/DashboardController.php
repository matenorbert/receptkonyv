<?php
/**
 * Created by PhpStorm.
 * User: Norbi
 * Date: 2017. 01. 25.
 * Time: 19:11
 */

namespace Blogger\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;


class DashboardController extends Controller
{
    /**
     * @Route("admin/dashboard/", name="dashboard")
     */
    public function mainPage()
    {
        $repository = $this->getDoctrine()->getRepository('BloggerAdminBundle:Alapanyag');
        $ingredients= $repository->findAll();
        return $this->render('BloggerAdminBundle:Default:dashboard.html.twig', array('username' => $this->getUser(), 'ingredients' => $ingredients));
    }
}