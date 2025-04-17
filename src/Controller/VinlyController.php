<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinlyController
{
    #[Route('/')]
    public function homepage(){
        return new Response('hello symfony');
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug) {
        if ($slug) {
            $title = u(str_replace('-',' ',$slug))->title(true);
        } else {
            $title = "no name";
        }
        return new Response($title);
        
    }
}
