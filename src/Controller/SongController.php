<?PHP
namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{

    #[Route('/api/songs/{id<\d+>}',methods:['GET'])]
    public function getSong(int $id,LoggerInterface $logger)
    {
        $song = [
            'id' => $id,
            'name' => 'Waterfall',
            'url' => 'vinly/homepage.html.twig',
        ];
        $logger->info('returning the song api response{song}',[
            'song'=>$id,
        ]);
        return $this->Json($song);
    }
}
