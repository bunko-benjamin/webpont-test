<?php

namespace Webpont\Test\Api\Bootstrap;

use Webpont\Test\Api\Contract\RequestInterface;
use Webpont\Test\Api\Contract\ResponseInterface;
use Webpont\Test\Api\Contract\RouteResolverInterface;
use Webpont\Test\Api\Contract\RouteRunnerInterface;
use Webpont\Test\Api\Contract\RoutingInterface;
use Webpont\Test\Api\Request\Request;
use Webpont\Test\Api\Response\Response;
use Webpont\Test\Api\Router\RouteResolver;
use Webpont\Test\Api\Router\RouteRunner;
use Webpont\Test\Api\Container\Container;
use Webpont\Test\Api\Routing\Routing;

class Bootstrap
{
    /**
     * @var Container
     */
    private $container;

    /**
     * Bootstrap constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function initialize()
    {
        $this->initRoutes();
        $this->initRouter();
        $this->initRequest();
        $this->initResponse();
    }

    private function initRequest()
    {
        $this->container->add(
            RequestInterface::class,
            new Request($this->container)
        );
    }

    private function initResponse()
    {
        $this->container->add(
            ResponseInterface::class,
            new Response($this->container)
        );
    }

    private function initRouter()
    {
        $this->container->add(
            RouteRunnerInterface::class,
            new RouteRunner()
        );
        $this->container->add(
            RouteResolverInterface::class,
            new RouteResolver($this->container)
        );
    }

    private function initRoutes()
    {
        $this->container->add(
            RoutingInterface::class,
            new Routing($this->container)
        );
    }
}
