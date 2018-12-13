<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SiteBundle\Entity\Post;
use SiteBundle\Entity\Image, Author;
use SiteBundle\Form\PostType;

class PostController extends Controller
{

    /**
     * @Route("/", name="post_index")
     */
    public function indexAction() {
       
        //retreive data with magic function
          // $repository = $this->getDoctrine()->getRepository("SiteBundle:Post");
          // $posts = $repository->findBy(['active' => 1, 'title' => 'lorem ipsum 2'], ['slug' => 'ASC'], null, 0);
        
        //retreive data with DQL Doctrine Query Language
        //   $em = $this->getDoctrine()->getManager();

        //   //for creating the query
        //   $query = $em->createQuery("SELECT p.title, p.active FROM SiteBundle:Post p WHERE p.active = :etat AND p.title like :titre");

        //   //Preparing the field
        //   $query->setParameter('etat', 1);
        //   $query->setParameter('titre', "%ipsum%");

        //   //for executing the query
        //   $posts = $query->getResult();

        $repository = $this->getDoctrine()->getRepository('SiteBundle:Post');

        // $query = $repository->createQueryBuilder("p")
        //                     ->where("p.active = 1")
        //                     //->where("p.title like '%1'")
        //                     ->orderBy("p.title", "DESC")
        //                     ->getQuery();
        
        $posts = $repository->findAll();
        
        return $this->render("SiteBundle:Post:index.html.twig", ["myPosts" => $posts]);
    }

    /**
     * @Route("/admin/post/create", name="post_create")
     */
    public function createAction(Request $request)
    {
       
        $post = new Post();
        
        //Declare a form
        $form = $this->createForm(PostType::class, $post);
        
             $form->handleRequest($request);

               if($form->isSubmitted() && $form->isValid()) {
                    
                    $em = $this->getDoctrine()->getManager();
                    
                    $file = $post->getImage()->getUrl();

                    $fileName = $file->getClientOriginalName().'.'.$file->guessExtension();

                    $file->move($this->getParameter('uploads_file'), $fileName);
                    
                    $post->getImage()->setUrl($fileName);

                    //Persister
                        $em->persist($post);
                    //Valider ou commiter la persistance
                        $em->flush();


                        $message = (new \Swift_Message('objet d envoi'))
                                ->setFrom('yassin@salafin.com')
                                ->setTo('idbrahimdev@gmail.com')
                                ->setBody(
                                    $this->renderView(
                                        // app/Resources/views/Emails/registration.html.twig
                                        'Default/email.html.twig',
                                        array('post' => $post)
                                    ),
                                    'text/html'
                                );

                                $this->get('mailer')->send($message);
                    
                    $request->getSession()->getFlashBag()->add('success', 'This post is saved successfully: '.$post->getTitle());
                    return $this->redirectToRoute("post_show", ['id' => $post->getId()]);
               }
          
               
       



        
        return $this->render('SiteBundle:Post:create.html.twig', ['f' => $form->createView()]);
      
            //Assurer la communication avec la DB
        //      $em = $this->getDoctrine()->getManager();

            
        //      $image = new Image();

        //      $image->setUrl("https://picsum.photos/200/300?image=6");
        //      $image->setAlt($myPost[3]['title']);
            
        //      $post = new Post();
        //      // //Initiliser les champs
        //      $post->setTitle($myPost[3]['title']);
        //      $post->setContent($myPost[3]['content']);
        //      $post->setSlug($myPost[3]['title']);
        //      $post->setImage($image);
        //      $post->setActive(1);

        //      $repository = $this->getDoctrine()->getRepository("SiteBundle:Author");
        //      $author = $repository->find(1);
        //      $post->setAuthor($author);


        //      $repository = $this->getDoctrine()->getRepository("SiteBundle:Category");
        //      $categories = $repository->findByActive(1);

        //      foreach($categories as $myCategory) {
        //          $post->addCategory($myCategory);
        //      }

        //     //Persister
        //     $em->persist($post);

        //    //Valider ou commiter la persistance
        //     $em->flush();

        // foreach($posts as $myPost) {
        //     //Instancier un objet depuis l'entité post
        //      $post = new Post();

        //       // //Initiliser les champs
        //       $post->setTitle($myPost['title']);
        //       $post->setContent($myPost['content']);
        //       $post->setSlug($myPost['title']);
        //       $post->setActive(1);

        //      //Persister
        //      $em->persist($post);

        //     //Valider ou commiter la persistance
        //      $em->flush();
        // }
       
         //return new Response('post created');
    }

    /**
     * @Route("/post/{id}", name="post_show")
     */
    public function showAction($id) {
       
        $repository = $this->getDoctrine()->getRepository("SiteBundle:Post");
        $post = $repository->find($id);

        return $this->render('SiteBundle:Post:show.html.twig', ['post' => $post]);
    }

    
     /**
     * @Route("/sendemail", name="post_email")
     */
    public function sendAction() {
        
        $message = (new \Swift_Message('objet d envoi'))
        ->setFrom('yassin@salafin.com')
        ->setTo('idbrahimdev@gmail.com')
        ->setBody(
            $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                'Default/email.html.twig',
                array('post' => $post)
            ),
            'text/html'
        );

        $this->get('mailer')->send($message);
        return new Response('email send');
    }

}
