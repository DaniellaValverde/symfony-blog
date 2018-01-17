<?php

namespace CA\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CA\BlogBundle\Entity\Post;
use CA\BlogBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\CA\BlogBundle\Controller\PostController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $x = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('CABlogBundle:Post')->findAll();

        $user = $x->getRepository('CABlogBundle:User')->findAll();

        return $this->render('CABlogBundle:Blog:index.html.twig', array(
            'posts' => $posts,
            'user' => $user,
        ));
    }

}
