<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinlyController extends AbstractController
{
    #[Route('/')]
    public function homepage(){
        // return new Response('hello symfony');
        $tracks = [
            ['song'=>'gangstar paradice','artist'=>'crazy'],
            ['song'=>'waterfall','artist'=>'abc']
        ];
        // dd($tracks);
        return $this->render('vinly/homepage.html.twig',[
            'title'=>'songs',
            'tracks'=>$tracks
        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug) {
        $genre = $slug ? u(str_replace('-',' ',$slug))->title(true): null;
        return $this->render('vinly/browse.html.twig',[
            'genre'=>$genre,
        ]);
        
    }
}
