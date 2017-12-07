<?php

namespace App\Controller\Admin;

use App\Form\Admin\LoginType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class IndexController extends Controller
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var AuthenticationUtils
     */
    private $authUtils;

    /**
     * IndexController constructor.
     *
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory, AuthenticationUtils $authUtils)
    {
        $this->formFactory = $formFactory;
        $this->authUtils = $authUtils;
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
        $builder = $this->formFactory->createNamedBuilder('', LoginType::class);
        $form = $builder->getForm();

        $error = $this->authUtils->getLastAuthenticationError();
        return [
            'form' => $form->createView(),
            'error' => $error
        ];
    }
}

