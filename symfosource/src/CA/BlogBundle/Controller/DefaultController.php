<?php

namespace CA\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use CA\BlogBundle\Entity\Post;
use CA\BlogBundle\Entity\User;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CABlogBundle:Default:index.html.twig');
    }
}
