<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/app", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }


    /**
     * @Route("/show/{id}/{year}/{slug}.{extension}", 
     * requirements={"id": "\d+", "slug":"[a-z]*", "year": "\d{4}", "exptension": "html|php"},
     * defaults={"extension": "html"},
     * name="defaut_show") 
     * */
    public function showAction($id, $year, $slug, $extension) {
       return new Response('je suis la page show '. $id . ' ' . $year . ' ' . $slug . ' ' . $extension);
    }
}
