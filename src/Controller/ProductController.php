<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * ProductController constructor.
     */
    public function __construct(ProductRepository $productRepository, FormFactoryInterface $formFactory)
    {
        $this->productRepository = $productRepository;
        $this->formFactory = $formFactory;
    }

    /**
     * @Route("/product/{id}", name="product")
     * @Template("product.twig")
     */
    public function index(Request $request, Product $Product)
    {
        $builder = $this->createFormBuilder(ProductType::class, $Product);
        $form = $builder->getForm();
        $form->handleRequest($request);

//        if ( $form->isSubmitted()) {
//
//        }

        return ['Product' => $Product, 'form' => $form->createView()];
    }
}
