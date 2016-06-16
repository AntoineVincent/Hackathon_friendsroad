<?php



namespace RoadBundle\Controller;


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
    public function newItineraireAction(Request $request, $idgroupe)
    {
        $em = $this->getDoctrine()->getManager();
        $itineraire = new Itineraire();
        $form = $this->createForm('RoadBundle\Form\ItineraireType', $itineraire);
        $form->handleRequest($request);
        $jsonData = json_decode($request->getContent(), true); // "true" to get an associative array
        $form->bind($jsonData);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $itineraire->setIdgroupe($idgroupe);
            $em->persist($itineraire);
            $em->flush();

            return array('itineraire' => $itineraire);

        }
        return View::create($form, 400);
    }
}

