<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * ProductController constructor.
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @Route("/product/{id}", name="product")
     * @Template("product.twig")
     */
    public function index(Product $Product)
    {
        $NewProduct = new Product();
        $NewProduct->name = "ディナーフォーク";
        $em = $this->getDoctrine()->getManager();
        $em->persist($NewProduct);
        $em->flush();

        return ['Product' => $Product];
    }
}
