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

    /**
     * @Route("/nomenclature", name="nomenclature")
     * @Method({"GET", "POST"})
     */
    public function nomenclatureAction(Request $request)
    {

        // return new Response(
        //    '<html><body>Lucky number: </body></html>'
        // );
        $repositoryNomencl = $this->getDoctrine()->getRepository('AppBundle:Nomenclature');
        $nomenclature= $repositoryNomencl->findAll();
        //   var_dump($departments);

        // return $this->render('@App/Pages/partners.html.twig', array(
        //     'partnerId' => $partnerId,
//        ));

        return $this->render('nomencl.html.twig', array(
            'nomenclature' => $nomenclature
        ));
    }



}
