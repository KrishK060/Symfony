<?php
namespace App\service;
use Psr\Cache\CacheItemInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
class MixRepositery{
    public function __construct(
        private HttpClientInterface $httpClient,
        private CacheInterface $cache,
        private bool $isDebug,
        ){}
    public function findAll(): array
    {
        /*
        $output = new BufferedOutput();
        $this->twigDebugCommand->run(new ArrayInput([]), $output);
        dd($output);
        */

        return $this->cache->get('mixes_data',function(CacheItemInterface $cacheItem) {
            $cacheItem->expiresAfter($this->isDebug ? 5 : 60);
            $response = $this->httpClient->request('GET','https://raw.githubusercontent.com/SymfonyCasts/vinyl-mixes/main/mixes.json');
            return $response->toArray();
        });
    }
}