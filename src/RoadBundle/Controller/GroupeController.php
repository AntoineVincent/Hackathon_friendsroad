<?php


namespace RoadBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

use RoadBundle\Entity\Groupe;
use RoadBundle\Form\GroupeType;
use FOS\RestBundle\View\View;

class GroupeController extends FOSRestController
{


    public function newgroupeAction(Request $request)
    {
        //$jsonObject = ' {"nom":"azert", "password":"azerty"} ';
        
        $groupe = new Groupe();
        $form = $this->createForm('RoadBundle\Form\GroupeType', $groupe);
        $jsonData = json_decode($request->getContent(), true); // "true" to get an associative array
        $form->bind($jsonData);

        $error_form = $form->getErrors();

        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupe);
            $em->flush();

            return array('groupe' =>  $groupe);
        }

        return View::create($form, 400);
    }
}

