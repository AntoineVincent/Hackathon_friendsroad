<?php

namespace RoadBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use RoadBundle\Entity\Membre;
use RoadBundle\Entity\Groupe;
use RoadBundle\Entity\Itineraire;
use RoadBundle\Entity\Budget;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('RoadBundle:Default:index.html.twig');
    }

    public function dashboardAction($idgroupe)
    {
        $em = $this->getDoctrine()->getManager();
        $groupe = $em->getRepository('RoadBundle:Groupe')->findOneByIdgroupe($idgroupe);
        $membres = $em->getRepository('RoadBundle:Membre')->findByIdgroupe($idgroupe);

        $result = [];
        foreach ($membres as $membre)
        {
            $userbudget = $em->getRepository('RoadBundle:Budget')->findOneByIdmembre($membre->getId());
            $resultuserbudget = array(
                'essence' => $essence,
                'bouffe' => $bouffe,
                'trajet' => $trajet,
                'sortie' => $sortie,
                'total' => $total,
            );
        }

        $budget = $em->getRepository('RoadBundle:Budget')->findOneByIdgroupe($idgroupe);
        $itineraire = $em->getRepository('RoadBundle:Itineraire')->findOneByIdgroupe($idgroupe);

        return array ($groupe, $membres, $resultuserbudget, $budget, $itineraire);
    }

    public function deleteGroupeAction($idgroupe)
    {
        $em = $this->getDoctrine()->getManager();
        $groupe = $em->getRepository('RoadBundle:Groupe')->findOneByIdgroupe($idgroupe);
        $membres = $em->getRepository('RoadBundle:Membre')->findByIdgroupe($idgroupe);

        $result = [];
        foreach ($membres as $membre)
        {
            $userbudget = $em->getRepository('RoadBundle:Budget')->findOneByIdmembre($membre->getId());

            $em->remove($userbudget);
            $em->remove($membre);
            $em->flush();
        }

        $budget = $em->getRepository('RoadBundle:Budget')->findOneByIdgroupe($idgroupe);

        $itineraire = $em->getRepository('RoadBundle:Itineraire')->findOneByIdgroupe($idgroupe);

        $em->remove($groupe);
        $em->remove($budget);
        $em->remove($itineraire);
        $em->flush();
    }

}
