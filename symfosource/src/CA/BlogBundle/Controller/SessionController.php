<?php

namespace CA\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Routing\Annotation\Route;


class SessionController extends Controller
{
    public function loginAction(Request $request)
    {

        $authUtils = $this->get('security.authentication_utils');
    	$session = $request->getSession();
		$error = $authUtils->getLastAuthenticationError();
		$lastUsername = $authUtils->getLastUsername();

    	//$session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);

        return $this->render('CABlogBundle:Session:login.html.twig', array(
		'last_username' => $lastUsername,
        'error'         => $error
        ));
    }

    public function logoutAction()
    {
        $this->get('security.context')->setToken(null);
        $this->get('request')->getSession()->invalidate();
        return $this->redirect($this->generateUrl('index'));
    }

}
