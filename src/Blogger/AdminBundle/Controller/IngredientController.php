<?php
/**
 * Created by PhpStorm.
 * User: mate.norbert
 * Date: 2017.02.01.
 * Time: 12:57
 */

namespace Blogger\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class IngredientController
 * @package Blogger\AdminBundle\Controller
 */
class IngredientController extends Controller
{
    /**
     * @Route("admin/ingredient/add")
     */
    public function create($ingredient)
    {

    }

    public function read()
    {

    }

    public function update($ingredient)
    {

    }

    /**
     * @Route("admin/ingredient/delete/")
     */
    public function delete()
    {

    }
}