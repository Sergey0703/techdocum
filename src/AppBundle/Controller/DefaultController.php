<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Department;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Templating;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Form\DepartForm;
use Doctrine\ORM\EntityRepository;


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
     * @Route("/departments/{depId}/", name="departments",
     *  requirements={
     *  "depId": "\d+"
     * })
     * @Method({"GET", "POST"})
     * @Template("departments.html.twig")
     * @return Response
     */
    public function departmentsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$dep_search = $em->getRepository('AppBundle:Department')
        //    ->getCatalogApartments(depId);
        //$qb = $em->createQueryBuilder();
        //$qb = $this->createQueryBuilder('d')
        //    ->where('d.id = 1');
        //$result_dep = $qb->getQuery()->getResult();
        //var_dump($result_dep);
        //if (!$result_dep) {
         //   throw $this->createNotFoundException('No Department found');
        //}
        $depId=1;
        $dep_search = $this->getDoctrine()
            ->getRepository('AppBundle:Department')
            ->find('1');
//var_dump($dep_search);
        if (!$dep_search) {
            throw $this->createNotFoundException(
                'No Department found for id ' . $depId
            );
        }

//        $outputData['dep_search'] = $dep_search;



        $form = $this->createForm(DepartForm::class,$dep_search);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $request->isMethod('POST')&& $form->isValid()) {
   //  var_dump('post');

            $data = $form->getData();                            
            $fDepart=new Department();
            $fDepart->setDepartname($data['departname']);
            $fDepart->setDepartdescription($data['departdescription']);
       //     $reviewEntity->setDate();
       //     $reviewEntity->setClientId($result->getClientId());
            $em->persist($fDepart);
            $em->flush();
        }


        $outputData['form']= $form->createView();
      //  $outputData['form']= $form->createView();

        $repository = $this->getDoctrine()->getRepository('AppBundle:Department');
        $departments = $repository->findAll();
        $outputData['departments']= $departments;
        return $outputData;
    }


    /**
     * @Route("/departments", name="list_departments")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @Template("departments.html.twig")
     * @return Response
     */
    public function departmentsListAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(DepartForm::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $request->isMethod('POST')&& $form->isValid()) {
            var_dump('post');
            $data = $form->getData();
            $fDepart=new Department();
            $fDepart->setDepartname($data['departname']);
            $fDepart->setDepartdescription($data['departdescription']);
            //     $reviewEntity->setDate();
            //     $reviewEntity->setClientId($result->getClientId());
            $em->persist($fDepart);
            $em->flush();
        }


        $outputData['form']= $form->createView();
        $repository = $this->getDoctrine()->getRepository('AppBundle:Department');
        $departments = $repository->findAll();
        $outputData['departments']= $departments;
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
