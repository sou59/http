<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Unirest;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/list", name="list")
     */
    public function listAction() {
        $url = "https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=87dfa1c669eea853da609d4968d294be";

        $response = Unirest\Request::get($url);

        return $this->render('default/list.html.twig', ['movies'=>$response->body->results]);

    }
}
