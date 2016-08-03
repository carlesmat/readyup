<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

use AppBundle\Entity\Exercici;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('readyup.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    public function saveDataAction(Request $request)
    {
        $iIdExercici = $request->request->get("idExercici");

        $oExercici = new Exercici();
        $oExercici->setIIdExercici($iIdExercici);
        $oExercici->setSNom("provatina");

        $em = $this->getDoctrine()->getManager();
        $em->persist($oExercici);
        $em->flush();

        $sData = array("response" => "Exercici ".$iIdExercici." saved");
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($sData, 'json');

        $response = new Response($jsonContent);
        $response->headers->set('Access-Control-Allow-Credentials: true');
        $response->headers->set('Access-Control-Allow-Origin: *');
        //$response->headers->set('Access-Control-Allow-Origin: http://192.168.1.196:8100');

        return $response;

        // replace this example code with whatever you need
        //return $this->render('default/saveData.html.twig');

        /*return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);*/
    }
}
