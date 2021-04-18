<?php
namespace Webpont\Test\Api\Router;

class RouteRunner
{
    /**
     * @param Route $route
     *
     * @return array
     */
    public function run(Route $route)
    {
        return call_user_func_array([
            $route->getController(),
            $route->getAction(),
        ], $route->getParameters());
    }
}
