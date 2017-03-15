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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;


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

    /**
     * @Route("admin/dashboard/ingredient/select", name="ingredient_select")
     */
    public function selectAction()
    {
        $repository = $this->getDoctrine()->getRepository('BloggerAdminBundle:Ingredient');
        return $this->render('BloggerAdminBundle:Default:ingredient.html.twig', array('ingredients' => $repository->findAll()));
    }

    /**
     * @Route("admin/dashboard/ingredient/create", name="ingredient_create")
     */
    public function create(Request $request)
    {
        try{
            $name = $request->request->get('name');

            if(!$name){
                throw new \Exception('Missing name parameter!');
            }

            $ingredient = new Ingredient();
            $ingredient->setName($name);
            $em = $this->getDoctrine()->getManager();
            $em->persist($ingredient);
            $em->flush();

            $res['ret'] = true;
        }catch(\Exception $e){
            $res['ret'] = false;
            $res['error'] = $e->getMessage();
        }

        return $this->json($res);
    }

    /**
     * @Route("admin/dashboard/ingredient/update", name="ingredient_update")
     */
    public function update(Request $request)
    {
        try{
            $name = $request->request->get('name');
            $id = $request->request->get('id');

            if(!$name || !$id)
            {
                throw new \Exception('Missing parameter!');
            }

            $em = $this->getDoctrine()->getManager();
            $ingredient = $this->getDoctrine()->getRepository('BloggerAdminBundle:Ingredient')->find($id);

            if(!$ingredient)
            {
                throw new \Exception('Selected ingredient not found!');
            }

            $ingredient->setName($name);
            $em->persist($ingredient);
            $em->flush();

            $res['ret'] = true;
        }catch(\Exception $e){
            $res['ret'] = false;
            $res['error'] = $e->getMessage();
        }

        return $this->json($res);
    }

    /**
     * @Route("admin/dashboard/ingredient/editAll", name="ingredient_editall")
     */
    public function editAll(Request $request)
    {
        $rows = $request->request->get('rows');

        if(!$rows || !is_array($rows))
        {
            throw new \Exception('Wrong parameter!');
        }

        try
        {
            $em = $this->getDoctrine()->getManager();

            foreach($rows as $row)
            {
                if(isset($row['id']))
                {
                    $ingredient = $this->getDoctrine()->getRepository('BloggerAdminBundle:Ingredient')->find($row['id']);
                }
                else
                {
                    $ingredient = new Ingredient();
                }

                $ingredient->setName($row['name']);
                $em->persist($ingredient);
            }

            $em->persist($ingredient);
            $em->flush();

            $res['ret'] = true;
        }
        catch(\Exception $e)
        {
            $res['ret'] = false;
            $res['error'] = $e->getMessage();
        }

        return $this->json($res);
    }
}