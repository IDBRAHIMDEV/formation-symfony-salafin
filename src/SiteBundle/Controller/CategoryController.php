<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use SiteBundle\Entity\Category;

class CategoryController extends Controller
{
    /**
     * @Route("/category")
     */
    public function indexAction()
    {
        return $this->render('SiteBundle:Category:index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/category/create")
     */
    public function createAction()
    {
        
        $categories = [
            ['name' => "Programming", "active" => 1],
            ['name' => "Design", "active" => 1],
            ['name' => "Architecture", "active" => 0],
        ];

        $em = $this->getDoctrine()->getManager();
        foreach($categories as $myCategory) {
            
            $category = new Category();
            $category->setName($myCategory['name']);
            $category->setActive($myCategory['active']);

            $em->persist($category);
            $em->flush();
        }

         return new Response("category created");
        // return $this->render('SiteBundle:Category:create.html.twig', array(
        //     // ...
        // ));
    }

}
