<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Test\TestContainer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test1", name="test1", methods ={"GET","POST"})
     */
    public function test1()
    {
        $html = '<html><head><body><h1>Coucou</h1></body></head></html>';
        // return new  Response($html);
        $res = new Response();
        $res->setContent($html);
        $res->headers->set('X-Token', md5("Coucou"));
        return $res;
    }

    public function test2()
    {
        $student = [
            'name' => 'Jerem',
            'age' => 18, 
            'isMute' => true
        ];

        // return new Response(json_encode($student));
        // return new Symfony\Component\HttpFoundation\JsonResponse($student);
        return $this->json($student);
    }


        /**
     * @Route("/test3", name="test3")
     */
    public function test3(Request $req)
    {
    
        $searchValue = $req-> query-> get('search');
        $methode = $req->getMethod();
        // dd($searchValue, $methode);
        return $this-> render('test/test3.html.twig');
    }

}
