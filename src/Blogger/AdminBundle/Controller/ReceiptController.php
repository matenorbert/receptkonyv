<?php
namespace Blogger\AdminBundle\Controller;

use Blogger\AdminBundle\Entity\Ingredient;
use Blogger\AdminBundle\Entity\Receipt;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;


class ReceiptController extends Controller
{
    /**
     * @Route("admin/dashboard/receipt/add",name="receipt_add")
     */
    public function add(Request $request)
    {
        $post_params = $request->request->all();
        echo $request->files->get('receiptimg')->getRealPath();
        $receipt = new Receipt();
        $receipt->setName($post_params['name']);

        $validator = $this->get('validator');
        $errors = $validator->validate($receipt);

        //print_r($errors);
    }
}