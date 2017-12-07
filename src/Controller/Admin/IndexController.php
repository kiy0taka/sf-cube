<?php

namespace App\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
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
     */
    public function login()
    {
        return new Response("Hello Login Form");
    }
}

