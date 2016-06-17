<?php


namespace RoadBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use RoadBundle\Form\BudgetType;
use RoadBundle\Entity\Budget;
use RoadBundle\Form\MembreType;
use RoadBundle\Entity\Membre;
use RoadBundle\Entity\Groupe;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

class BudgetController extends Controller
{
    public function newBudgetAction(Request $request, $idgroupe)
    {
        $budget = new Budget();
        $form = $this->createForm('RoadBundle\Form\BudgetType', $budget);
        $jsonData = json_decode($request->getContent(), true); // "true" to get an associative array
        $form->bind($jsonData);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $budget->setIdgroupe($idgroupe);
            $em->persist($budget);
            $em->flush();

            return array('budget' => $budget);
            
        }
        return View::create($form, 400);
    }

    public function algoBudgetAction(Request $request, $idmembre)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("RoadBundle:Membre")->findOneByIdmembre($idmembre);
        $budUsers = $em->getRepository("RoadBundle:Budget")->findbyIdmembre($idmembre);
        $budget = $em->getRepository("RoadBundle:Budget")->findOneByIdgroupe($user->getIdgroupe());

        $count = 0;
        foreach ($budUsers as $budUser){
            $totalUser = $budUser->getTotal();
            $count += $totalUser;
        }

        $totalbudget = $budget->getTotal();

        $effvalue = $totalbudget - $count;

        return array('budget' => $budget,
            'effvalue' => $effvalue,
            'budUsers' => $budUsers,
        );

    }
    
    public function newuserBudgetAction(Request $request, $idmembre)
    {
        $budget = new Budget();
        $form = $this->createForm('RoadBundle\Form\BudgetType', $budget);
        $jsonData = json_decode($request->getContent(), true); // "true" to get an associative array
        $form->bind($jsonData);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $budget->setIduser($idmembre);
            $em->persist($budget);
            $em->flush();

            return array('budget' => $budget);

        }
        return View::create($form, 400);
    }
}

