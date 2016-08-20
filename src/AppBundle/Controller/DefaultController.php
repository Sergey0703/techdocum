<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Templating;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/transfers", name="home")
     * @Method({"GET", "POST"})
     */
     public function homepageAction(Request $request)
    {

       // return new Response(
        //    '<html><body>Lucky number: </body></html>'
       // );
        $repository = $this->getDoctrine()->getRepository('AppBundle:Transfer');
        $transfers = $repository->findAll();
     //   var_dump($departments);

       // return $this->render('@App/Pages/partners.html.twig', array(
       //     'partnerId' => $partnerId,
//        ));

        return $this->render('home.html.twig', array(
        'transfers' => $transfers
        ));
    }

    /**
     * @Route("/")
     * @Method({"GET","POST"})
     */
    public function homeAction(){
        return $this->redirectToRoute("home");
    }


    /**
     * @Route("/departments", name="departments")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @Template("departments.html.twig")
     * @return Response
     */
    public function departmentsAction(Request $request)
    {


        $repository = $this->getDoctrine()->getRepository('AppBundle:Department');
        $departments = $repository->findAll();
        //   var_dump($departments);
      //  $reviewEntity=new Comment();
     //   $reviewEntity->setOrderHash($orderHash);
     //   $form=$this->createForm(LeaveReview::class, $reviewEntity);
     //   $form->handleRequest($request);
     //   $form = $this->createForm(ContactsType::class);
//var_dump($_SERVER['SERVER_NAME']);

        if($request->getMethod()=='POST'){
      //  if ($form->isSubmitted() && $form->isValid() && $request->isMethod('POST')) {
     //     $reviewEntity->setApartmentId($apartment);
       //     $reviewEntity->setDate();
       //     $reviewEntity->setClientId($result->getClientId());
       //     $em->persist($reviewEntity);
       //     $em->flush();
        }

     //   return $this->render('department.html.twig', array(
     //       'departments' => $departments
     //   ));
        $outputData['id']=1;
        return $outputData;
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
        //   var_dump($nomenclature);

        // return $this->render('@App/Pages/partners.html.twig', array(
        //     'partnerId' => $partnerId,
//        ));

        return $this->render('nomencl.html.twig', array(
            'nomenclature' => $nomenclature
        ));
    }



}
