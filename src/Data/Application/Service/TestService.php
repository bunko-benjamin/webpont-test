<?php

namespace Webpont\Test\Data\Application\Service;

use Webpont\Test\Data\Domain\Service\GetNumbersService;

class TestService
{
    /**
     * @param int $from
     * @param int $limit
     *
     * @return array
     */
    public function getNumbers(int $from, int $limit): array
    {
        $getNumberService = new GetNumbersService();

        return $getNumberService->get($from, $limit);
    }
}