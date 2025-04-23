<?php

namespace App\Controller;

use App\service\MixRepositery;
use Psr\Cache\CacheItemInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;

use function Symfony\Component\String\u;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class VinlyController extends AbstractController
{
    #[Route('/',name:'app_homepage')]
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

    #[Route('/browse/{slug}',name:'app_browse')]
    public function browse(MixRepositery $mixRepositery,string $slug=null) {

        // dd($this->getParameter('kernel.project_dir'));

        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;
        $mixes = $mixRepositery->findAll();
        
        
     
        return $this->render('vinly/browse.html.twig',[
            'genre'=>$genre,
            'mixes' => $mixes,
        ]);
        
    }
    
}
