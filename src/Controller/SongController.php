<?PHP
namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{

    #[Route('/api/songs/{id<\d+>}',methods:['GET'],name:'api_song_get_one')]
    public function getSong(int $id,LoggerInterface $logger)
    {
        $song = [
            'id' => $id,
            'name' => 'Waterfall',
            'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3',
        ];
        $logger->info('returning the song api response{song}',[
            'song'=>$id,
        ]);
        return $this->Json($song);
    }
}
