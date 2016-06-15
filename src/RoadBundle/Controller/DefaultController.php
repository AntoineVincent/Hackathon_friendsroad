<?php

namespace RoadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RoadBundle:Default:index.html.twig');
    }
}
