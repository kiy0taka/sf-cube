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
     * @Template("@front/product.twig")
     */
    public function index(Request $request, Product $Product)
    {
        $builder = $this
            ->formFactory
            ->createNamedBuilder('', ProductType::class, $Product);

        $form = $builder->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush($Product);
        }

        return ['Product' => $Product, 'form' => $form->createView()];
    }
}
