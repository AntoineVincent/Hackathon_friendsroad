<?php


namespace RythmBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use RoadBundle\Form\ItineraireType;
use RoadBundle\Entity\Itineraire;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

class ItineraireController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
    }
    public function autreAction(Request $request)
    {

    }
    public function newAction(Request $request)
    {

    }
    public function againAction(Request $request)
    {

    }
}

