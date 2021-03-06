<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Department;
use AppBundle\Entity\Nomenclature;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Templating;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Form\DepartForm;
use AppBundle\Form\NomenclatureForm;
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
     * @param depId
     * @param Request $request
     * @Method({"GET", "POST"})
     * @Template("departments.html.twig")
     * @return Response
     */
    public function departmentsAction(Request $request,$depId)
    {
       // var_dump('00');
        $em = $this->getDoctrine()->getManager();
        $dep_search = $this->getDoctrine()
            ->getRepository('AppBundle:Department')
            ->find($depId);

//var_dump($dep_search);
        if (!$dep_search) {
            throw $this->createNotFoundException(
                'No Department found for id ' . $depId
            );
        }
        $form = $this->createForm(DepartForm::class,$dep_search);

        $form->handleRequest($request);
      //  var_dump($request->request);
        if ($form->isSubmitted() && $request->isMethod('POST')&& $form->isValid()) {
            //  var_dump('post');
   //         var_dump('_0_');
            if ($dep_search) {
                var_dump('_update_');
               // $data = $form->getData();
               //     var_dump($data);
               $dep_search->setDepartname($form['departname']->getData());
               $dep_search->setDepartdescription($form['departdescription']->getData());

                $em->persist($dep_search);
                $em->flush();
                return $this->redirectToRoute("list_departments");

                //var_dump('_2_');
            } else{
           //     var_dump('_add_');
           //     $data = $form->getData();
                                        
           // $fDepart = new Department();
           // $fDepart->setDepartname($data['departname']);
           // $fDepart->setDepartdescription($data['departdescription']);

          //  $em->persist($fDepart);
          //  $em->flush();
        }
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
            unset($fDepart);
            unset($form);                                  
            $form = $this->createForm(DepartForm::class);
        }


        $outputData['form']= $form->createView();
        $repository = $this->getDoctrine()->getRepository('AppBundle:Department');
        $departments = $repository->findAll();
        $outputData['departments']= $departments;
        return $outputData;
    }



    /**
     * @Route("/nomenclature/{nomId}/", name="nomenclature",
     *  requirements={
     *  "nomId": "\d+"
     * })
     * @param nomId
     * @param Request $request
     * @Method({"GET", "POST"})
     * @Template("nomenclature.html.twig")
     * @return Response
     */
    public function nomenclatureAction(Request $request,$nomId)
    {
         var_dump('00');
        $em = $this->getDoctrine()->getManager();
        $nom_search = $this->getDoctrine()
            ->getRepository('AppBundle:Nomenclature')
            ->find($nomId);
        var_dump('01');
        //var_dump($nom_search);
        if (!$nom_search) {
            throw $this->createNotFoundException(
                'No Nomenclature found for id ' . $nomId
            );
        }
        var_dump('02');
        $form = $this->createForm(NomenclatureForm::class,$nom_search);
        var_dump('03');
        $form->handleRequest($request);
        //  var_dump($request->request);
        if ($form->isSubmitted() && $request->isMethod('POST')&& $form->isValid()) {
            //  var_dump('post');
            //         var_dump('_0_');
            if ($nom_search) {
                var_dump('_update_');
                // $data = $form->getData();
                //     var_dump($data);
                $nom_search->setNomenclname($form['nomenclname']->getData());
                $nom_search->setNomencldescription($form['nomencldescription']->getData());

                $em->persist($nom_search);
                $em->flush();
                return $this->redirectToRoute("list_nomenclature");

                //var_dump('_2_');
            } else{
                //     var_dump('_add_');
                //     $data = $form->getData();

                // $fDepart = new Department();
                // $fDepart->setDepartname($data['departname']);
                // $fDepart->setDepartdescription($data['departdescription']);

                //  $em->persist($fDepart);
                //  $em->flush();
            }
        }



        $outputData['form']= $form->createView();
        //  $outputData['form']= $form->createView();

        $repository = $this->getDoctrine()->getRepository('AppBundle:Nomenclature');
        $nomenclature = $repository->findAll();
        $outputData['nomenclature']= $nomenclature;
        return $outputData;
    }



    /**
     * @Route("/nomenclature", name="list_nomenclature")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @Template("nomenclature.html.twig")
     * @return Response
     */
    public function nomenclatureListAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(NomenclatureForm::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $request->isMethod('POST')&& $form->isValid()) {
            var_dump('post_nomencl');
            $data = $form->getData();
            $fNomencl=new Nomenclature();
            $fNomencl->setNomenclname($data['nomenclname']);
            $fNomencl->setNomencldescription($data['nomencldescription']);
            //     $reviewEntity->setDate();
            //     $reviewEntity->setClientId($result->getClientId());
            $em->persist($fNomencl);
            $em->flush();
            unset($fNomencl);
            unset($form);
            $form = $this->createForm(NomenclatureForm::class);
        }


        $outputData['form']= $form->createView();
        $repository = $this->getDoctrine()->getRepository('AppBundle:Nomenclature');
        $nomenclature = $repository->findAll();
        $outputData['nomenclature']= $nomenclature;
        return $outputData;
    }



}

