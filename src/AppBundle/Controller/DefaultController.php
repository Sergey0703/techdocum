<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Templating;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Method({"GET", "POST"})
     */
     public function homeAction(Request $request)
    {
        // replace this example code with whatever you need
        //return $this->render('default/index.html.twig', [
        //    'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        //]);
       // return new Response(
        //    '<html><body>Lucky number: </body></html>'
       // );
        $repository = $this->getDoctrine()->getRepository('AppBundle:Department');
        $departments = $repository->findAll();
     //   var_dump($departments);

       // return $this->render('@App/Pages/partners.html.twig', array(
       //     'partnerId' => $partnerId,
//        ));

        return $this->render('home.html.twig', array(
        'departments' => $departments
        ));
    }
}
