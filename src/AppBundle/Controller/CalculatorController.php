<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class CalculatorController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {

        return $this->render('default/index.html.twig', [
                    'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/calculator", name="calculator")
     * @Method("POST")
     */
    public function calculateAction(Request $request) {
        if ($request->isMethod('POST')) {
            $first_value = $request->request->get('first_value');
            $second_value = $request->request->get('second_value');
            $operator = $request->request->get('operator');
            switch ($operator) {
                case "+":
                    $total = $first_value + $second_value;
                    break;
                case "-":
                    $total = $first_value - $second_value;
                    break;
                case "*":
                    $total = $first_value * $second_value;
                    break;
                case "/":
                    $total = $first_value / $second_value;
                    break;
                default:
                    $total =  "Please Use Only Numbers";
                    break;
            }
        }else{
            die('This page is only for results!');
        }

        return $this->render('default/result.html.twig', array('total' => $total));
    }

}
