<?php
namespace Webpont\Test\Api;

use Webpont\Test\Api\Bootstrap\Bootstrap;
use Webpont\Test\Api\Container\Container;
use Webpont\Test\Api\Contract\ResponseInterface;
use Webpont\Test\Api\Contract\RouteResolverInterface;
use Webpont\Test\Api\Contract\RouteRunnerInterface;
use Webpont\Test\Api\Exception\UnauthorizedUserException;
use Webpont\Test\Api\Response\HttpStatus;

class Api
{
    public static function run()
    {
        $container = new Container();
        $bootstrap = new Bootstrap($container);

        $bootstrap->initialize();

        $routeResolver = $container->get(RouteResolverInterface::class);
        $routeRunner   = $container->get(RouteRunnerInterface::class);

        try {
            $route = $routeResolver->resolve();

            return $routeRunner->run($route);
        } catch (\Exception $e) {
            $response = $container->get(ResponseInterface::class);

            return $response->withStatus(HttpStatus::HTTP_INTERNAL_SERVER_ERROR)->toJson(
                [
                    'error' => $e->getMessage(),
                ]
            );
        }
    }
}
