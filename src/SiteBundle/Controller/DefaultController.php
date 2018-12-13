<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
  
    /**
     * @Route("/site/list")
     */
    public function indexAction()
    {
        $title = "this is my title of this page";
        $posts = [
            ["id" => 1, "title" => "lorem ipsum 1", "image" => "https://picsum.photos/200/300?image=0", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 2, "title" => "lorem ipsum 2", "image" => "https://picsum.photos/200/300?image=1", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 3, "title" => "lorem ipsum 3", "image" => "https://picsum.photos/200/300?image=2", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 4, "title" => "lorem ipsum 4", "image" => "https://picsum.photos/200/300?image=3", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 5, "title" => "lorem ipsum 5", "image" => "https://picsum.photos/200/300?image=4", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 6, "title" => "lorem ipsum 6", "image" => "https://picsum.photos/200/300?image=5", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
        ];

        return $this->render('SiteBundle:Default:index.html.twig', ['myTitle' => $title, 'myPosts' => $posts]);
    }

    
     /**
     * @Route("/site")
     */
    public function homeAction()
    {
        $title = "Home page";

        $slides = [
            ["id" => 1, "title" => "lorem ipsum 1", "image" => "https://picsum.photos/200/300?image=0", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 2, "title" => "lorem ipsum 2", "image" => "https://picsum.photos/200/300?image=1", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 3, "title" => "lorem ipsum 3", "image" => "https://picsum.photos/200/300?image=2", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 4, "title" => "lorem ipsum 4", "image" => "https://picsum.photos/200/300?image=3", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 5, "title" => "lorem ipsum 5", "image" => "https://picsum.photos/200/300?image=4", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 6, "title" => "lorem ipsum 6", "image" => "https://picsum.photos/200/300?image=5", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
        ];

        $posts = [
            ["id" => 1, "title" => "lorem ipsum 1", "image" => "https://picsum.photos/200/300?image=0", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 2, "title" => "lorem ipsum 2", "image" => "https://picsum.photos/200/300?image=1", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 3, "title" => "lorem ipsum 3", "image" => "https://picsum.photos/200/300?image=2", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
        ];

        return $this->render('SiteBundle:Site:home.html.twig', ['myTitle' => $title, 'mySlides' => $slides, 'myPosts' => $posts]);
    }



    /**
     * @Route("/site/create")
     */
    public function createAction()
    {
        return $this->render('SiteBundle:Site:create.html.twig');
    }


     /**
     * @Route("/site/about")
     */
    public function aboutAction()
    {
        $title = "page About";
        $posts = [
            ["id" => 1, "title" => "lorem ipsum 1", "image" => "https://picsum.photos/200/300?image=0", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 2, "title" => "lorem ipsum 2", "image" => "https://picsum.photos/200/300?image=1", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 3, "title" => "lorem ipsum 3", "image" => "https://picsum.photos/200/300?image=2", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 4, "title" => "lorem ipsum 4", "image" => "https://picsum.photos/200/300?image=3", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 5, "title" => "lorem ipsum 5", "image" => "https://picsum.photos/200/300?image=4", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 6, "title" => "lorem ipsum 6", "image" => "https://picsum.photos/200/300?image=5", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
        ];

        return $this->render('SiteBundle:Site:about.html.twig', ['myTitle' => $title, 'myPosts' => $posts]);
    }


     /**
     * @Route("/site/contact")
     */
    public function contactAction()
    {   

        return $this->render('SiteBundle:Site:contact.html.twig', ['phone' => '06 50 33 15', 'fax' => '06 44 34 23 12', 'email' => 'idbrahimdev@gmail.com']);
    }


     /**
     * @Route("/site/{id}")
     */
    public function showAction($id)
    {
        $title = "page show";
        $posts = [
            ["id" => 1, "title" => "lorem ipsum 1", "image" => "https://picsum.photos/200/300?image=0", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 2, "title" => "lorem ipsum 2", "image" => "https://picsum.photos/200/300?image=1", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 3, "title" => "lorem ipsum 3", "image" => "https://picsum.photos/200/300?image=2", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 4, "title" => "lorem ipsum 4", "image" => "https://picsum.photos/200/300?image=3", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 5, "title" => "lorem ipsum 5", "image" => "https://picsum.photos/200/300?image=4", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
            ["id" => 6, "title" => "lorem ipsum 6", "image" => "https://picsum.photos/200/300?image=5", "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero autem reiciendis et."],
        ];

        return $this->render('SiteBundle:Site:show.html.twig', ['myTitle' => $title, 'myPost' => $posts[$id]]);

    }

}
