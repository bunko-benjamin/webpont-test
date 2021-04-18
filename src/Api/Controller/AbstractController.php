<?php

namespace Webpont\Test\Api\Controller;

use Webpont\Test\Api\Container\Container;
use Webpont\Test\Api\Contract\ControllerInterface;

abstract class AbstractController implements ControllerInterface
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * AbstractController constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function run()
    {

    }
}
