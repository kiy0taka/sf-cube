<?php

namespace App\Controller\Admin;

use App\Form\Admin\LoginType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * IndexController constructor.
     *
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * @Route("/admin/", name="admin_homepage")
     * @Template("@admin/index.twig")
     *
     */
    public function index()
    {
        return [];
    }

    /**
     * @Route("/admin/login", name="admin_login")
     * @Template("@admin/login.twig")
     */
    public function login(Request $request)
    {
        $builder = $this->formFactory->createBuilder(LoginType::class);
        $form = $builder->getForm();
        $form->handleRequest($request);

        
        return [];
    }
}

