<?php

namespace Netgusto\AdminLTEBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\Security\Core\SecurityContext,
    Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {
    
    public function indexAction() {
        return $this->render('NetgustoAdminLTEBundle:Default:index.html.twig');
    }
}
