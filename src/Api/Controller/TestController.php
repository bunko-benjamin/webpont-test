<?php

namespace Webpont\Test\Api\Controller;

use Webpont\Test\Data\Application\Service\TestService;
use Webpont\Test\Api\Contract\ResponseInterface;
use Webpont\Test\Api\Response\HttpStatus;

class TestController extends AbstractController
{
    /**
     * @param string $from
     * @param string $limit
     *
     * @return mixed
     */
    public function getData(string $from, string $limit)
    {
        $testService = $this->getTestService();
        $data        = $testService->getNumbers((int)$from, (int)$limit);
        $response = $this->container->get(ResponseInterface::class);

        return $response->withStatus(HttpStatus::HTTP_OK)->toJson($data);
    }

    public function index()
    {
        $testService = $this->getTestService();
        $from        = isset($_GET['from']) ? $_GET['from'] : 1;
        $limit       = isset($_GET['limit']) ? $_GET['limit'] : 10;
        $numbers     = $testService->getNumbers($from, $limit);
        $response    = $this->container->get(ResponseInterface::class);
        $steps       = [5, 10];

        return $response->withStatus(HttpStatus::HTTP_OK)->fromTemplate('index', [
            'title'   => 'Diamond grid',
            'numbers' => $numbers,
            'steps' => $steps
        ]);
    }

    private function getTestService()
    {
        return new TestService();
    }
}
