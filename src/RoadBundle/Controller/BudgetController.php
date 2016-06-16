<?php


namespace RoadBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use RoadBundle\Form\BudgetType;
use RoadBundle\Entity\Budget;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

class BudgetController extends Controller
{
    public function getBudgetAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $budget = $em->getRepository('RoadBundle:Budget')->findOneByIDgroupe($id);

        return array('budget' => '$budget');

    }
    public function newBudgetAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $budget = new Budget();
        $form = $this->createForm('RoadBundle\Form\BudgetType', $budget);
        $form->handleRequest($request);
        $jsonData = json_decode($request->getContent(), true); // "true" to get an associative array
        $form->bind($jsonData);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $budget->setIdgroupe($id);
            $em->persist($budget);
            $em->flush();

            return array('budget' => $budget);
            
        }
        return View::create($form, 400);
    }
    public function updateBudgetAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $budget = $em->getRepository('RoadBundle:Budget')->findOneByIdgroupe($id);

        $editForm = $this->createForm('RoadBundle\Form\BudgetType', $budget);

        $jsonData = json_decode($request->getContent(), true); // "true" to get an associative array

        $editForm->bind($jsonData);
        if ($budget) {
            if ($editForm->isValid()) {

                $em->persist($budget);
                $em->flush();

                return array('budget' => $budget);
            } else {
                return View::create($editForm, 400);
            }
        } else {
            throw $this->createNotFoundException('Budget not found!');
        }
    }
    public function deleteBudgetAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $budget = $em->getRepository('RoadBundle:budget')->findOneByIdgroupe($id);
        
        $em->remove($budget);
        $em->flush();
    }

}

