<?php

namespace CA\BlogBundle\Controller;

use CA\BlogBundle\Form\UserType;
use CA\BlogBundle\Form\PostType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CA\BlogBundle\Entity\User;
use CA\BlogBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\Mapping as ORM;


/**
 * User controller.
 *
 */
class UserController extends Controller
{
    /**
     * List 1 user and its posts.
     *
     */
    public function idAction(User $user)  ///ex_06 Day_03
    {           
        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('CABlogBundle:Post')->findAll();

        return $this->render('user/id.html.twig', array(
            'posts' => $posts,
            'user' => $user->getUser(),
        ));
    }

    /**
     * Lists all user entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('CABlogBundle:User')->findAll();

        return $this->render('user/index.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * Creates a new user entity.
     *
     */
    public function newAction(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $random = random_int(1, 1999);
        //$encoder = $this->get('controller.service_arguments');
        $user = new User();
        $user->setSalt($random);  ///// + salt
        $role = array('ROLE_BLOGGER');
        $user->setRoles($role);
        $form = $this->createForm('CA\BlogBundle\Form\UserType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //dump($user->getPlainPassword());
            $password = $encoder->encodePassword($user, $user->getPlainPassword());
            //dump($user->getPlainPassword());
            $user->setPassword($password);
            //dump($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return $this->render('user/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a user entity.
     *
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('user/show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing user entity.
     *
     */
    public function editAction(Request $request, User $user)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('CA\BlogBundle\Form\UserType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_edit', array('id' => $user->getId()));
        }

        return $this->render('user/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a user entity.
     *
     */
    public function deleteAction(Request $request, User $user)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param User $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
