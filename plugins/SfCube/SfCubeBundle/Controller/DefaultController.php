<?php

namespace SfCube\SfCubeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/bundle")
     */
    public function indexAction()
    {
        return $this->render('SfCubeBundle:Default:index.html.twig');
    }
}
