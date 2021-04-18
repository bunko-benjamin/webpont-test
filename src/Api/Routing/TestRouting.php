<?php

namespace Webpont\Test\Api\Routing;

use Webpont\Test\Api\Controller\TestController;

class TestRouting extends AbstractRouting
{
    /**
     * @return array|\string[][]
     */
    public function get(): array
    {
        return [
            [
                self::ROUTE_KEY  => 'get-data/{from}/{limit}',
                self::CLASS_KEY  => TestController::class,
                self::ACTION_KEY => 'getData',
                self::METHOD_KEY => 'get',
            ],
            [
                self::ROUTE_KEY  => '',
                self::CLASS_KEY  => TestController::class,
                self::ACTION_KEY => 'index',
                self::METHOD_KEY => 'get',
            ],
        ];
    }
}
