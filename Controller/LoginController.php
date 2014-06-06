<?php

namespace Netgusto\AdminLTEBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\Security\Core\SecurityContext;


class LoginController extends Controller {
    
    public function indexAction() {

        if($this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
           throw new \Exception("Error Processing Request", 1);
           // redirect authenticated users to homepage
           return $this->redirect($this->generateUrl('netgusto_baikal_admin_homepage'));
        }

        if($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
           throw new \Exception("Error Processing Request", 1);
           // redirect authenticated users to homepage
           return $this->redirect($this->generateUrl('netgusto_baikal_admin_homepage'));
        }

        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
           $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
           $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
           $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('NetgustoAdminLTEBundle:Login:index.html.twig', array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error' => $error,
        ));
    }
}
