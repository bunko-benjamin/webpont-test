<?php

namespace Webpont\Test\Api\Routing;

use Webpont\Test\Api\Container\Container;

class Routing
{
    /**
     * @var Container
     */
    private $container;

    /**
     * Routing constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @return array
     */
    public function get()
    {
        return array_merge(
            (new TestRouting())->get()
        );
    }
}
