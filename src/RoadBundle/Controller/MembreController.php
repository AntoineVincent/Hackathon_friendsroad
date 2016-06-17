<?php


namespace RoadBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use RoadBundle\Form\MembreType;
use RoadBundle\Entity\Membre;
use RoadBundle\Entity\Groupe;
use RoadBundle\Form\GroupeType;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;


class MembreController extends Controller
{
    public function getmembreAction($idgroupe)
    {
        $em = $this->getDoctrine()->getManager();
        $groupe = $em->getRepository('RoadBundle:Groupe')->findOneById($idgroupe);
        $membres = $em->getRepository('RoadBundle:Membre')->findByIdgroupe($idgroupe);

        return array ('membres' => $membres);
    }

    public function newMembreAction(Request $request, $idgroupe)
    {
        $em = $this->getDoctrine()->getManager();
        $membre = new Membre();

        $add = $em->getRepository('RoadBundle:Groupe')->findOneById($idgroupe);

        $jsonData = json_decode($request->getContent(), true); // "true" to get an associative array
        $email = $jsonData['email'];
        $nom = $jsonData['nom'];
        
        $membre->setEmail($email);
        $membre->setUsername($nom);

        $membre->setIdgroupe($add->getId());
        $membre->setPassword($add->getPassword());
            
        $em->persist($membre);
        $em->flush();

        return array('membre' => $membre);
    }

    public function editMembreAction(Request $request, $idgroupe)
    {
        $em = $this->getDoctrine()->getManager();
        $membre = $em->getRepository('RoadBundle:Membre')->findOneByIdgroupe($idgroupe);

        $editForm = $this->createForm('RoadBundle\Form\MembreType', $membre);

        $jsonData = json_decode($request->getContent(), true); // "true" to get an associative array

        $editForm->bind($jsonData);
        if ($membre) {
            if ($editForm->isValid()) {

                $em->persist($membre);
                $em->flush();

                return array('membre' => $membre);
            } else {
                return View::create($editForm, 400);
            }
        } else {
            throw $this->createNotFoundException('Membre not found!');
        }
    }

}
