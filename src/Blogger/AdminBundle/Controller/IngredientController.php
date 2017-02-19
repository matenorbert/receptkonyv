<?php
/**
 * Created by PhpStorm.
 * User: Norbi
 * Date: 2017. 02. 18.
 * Time: 21:39
 */

namespace Blogger\AdminBundle\Controller;

use Blogger\AdminBundle\Entity\Ingredient;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;


class IngredientController extends Controller
{
    /**
     * @Route("admin/dashboard/ingredient/delete/{id}", name="ingredient")
     */
    public function delete($id)
    {

        $em = $this->getDoctrine()->getManager();
        $ingredient = $this->getDoctrine()
            ->getRepository('BloggerAdminBundle:Ingredient')
            ->find($id);
        $em->remove($ingredient);
        $em->flush();

        return $this->json(array('test' => $id));
    }
}