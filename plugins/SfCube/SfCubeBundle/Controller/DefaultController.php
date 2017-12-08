<?php

namespace SfCube\SfCubeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SfCubeSfCubeBundle:Default:index.html.twig');
    }
}
