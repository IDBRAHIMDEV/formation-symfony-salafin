<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use SiteBundle\Entity\Author;

class AuthorController extends Controller
{
    /**
     * @Route("/author")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository("SiteBundle:Author");
        $authors = $repository->findAll();

        return $this->render('SiteBundle:Author:index.html.twig', ['authors' => $authors]);
    }

    /**
     * @Route("/author/create")
     */
    public function createAction()
    {
        
        $authors = [
            ['firstname' => "Mohamed", "lastname" => "IDBRAHIM"],
            ['firstname' => "Yassine", "lastname" => "SABAR"],
            ['firstname' => "Basma", "lastname" => "IDBRAHIM"],
        ];

        $em = $this->getDoctrine()->getManager();

         foreach($authors as $myAuthor) {
             
            $author = new Author();
             $author->setFirstName($myAuthor['firstname']);
             $author->setLastName($myAuthor['lastname']);
            
             $em->persist($author);
             $em->flush();

         }

         return new Response("author created");

        // return $this->render('SiteBundle:Author:create.html.twig', array(
        //     // ...
        // ));
    }

}
