<?php

namespace Webpont\Test\Api\Router;

use Webpont\Test\Api\Container\Container;
use Webpont\Test\Api\Contract\RequestInterface;
use Webpont\Test\Api\Contract\RouteResolverInterface;
use Webpont\Test\Api\Contract\RoutingInterface;
use Webpont\Test\Api\Exception\InvalidActionException;
use Webpont\Test\Api\Exception\InvalidControllerException;
use Webpont\Test\Api\Exception\InvalidRequestMethodException;
use Webpont\Test\Api\Exception\RouteNotFoundException;
use Webpont\Test\Api\Routing\AbstractRouting;

class RouteResolver implements RouteResolverInterface
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @var string[]
     */
    private $supportedHttpMethods = ['get', 'post'];

    /**
     * Router constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     *
     * @throws InvalidActionException
     * @throws InvalidControllerException
     * @throws InvalidRequestMethodException
     * @throws RouteNotFoundException
     */
    public function resolve()
    {
        $request = $this->container->get(RequestInterface::class);

        if (!in_array($request->getRequestMethod(), $this->supportedHttpMethods)) {
            throw new InvalidRequestMethodException('Invalid method.');
        }

        $routing    = $this->container->get(RoutingInterface::class);
        $uri        = urldecode($request->getUri());
        $cleanedUrl = str_replace(' ', '', $uri);

        foreach ($routing->get() as $route) {
            $regex = '/^' . preg_replace(['/{\w+}/', '/\//'], ['[\p{L}A-Za-z0-9,_.-]+', '\/'], $route[AbstractRouting::ROUTE_KEY]) . '$/u';

            if (preg_match($regex, $cleanedUrl)
                && $request->getRequestMethod() === strtolower($route[AbstractRouting::METHOD_KEY])) {
                return $this->handleRoute($uri, $route);
            }
        }

        throw new RouteNotFoundException('Route not found.');
    }

    /**
     * @param string $uri
     * @param array $route
     *
     * @return Route
     *
     * @throws InvalidActionException
     * @throws InvalidControllerException
     */
    private function handleRoute(string $uri, array $route): Route
    {
        $request         = $this->container->get(RequestInterface::class);
        $uriParameters   = explode('/', $uri);
        $routeParameters = explode('/', $route[AbstractRouting::ROUTE_KEY]);
        $items           = array_map(function($item, $key) use ($uriParameters) {
            return preg_match('/{\w+}/', $item) ? $uriParameters[$key] : null;
        }, $routeParameters, array_keys($routeParameters));

        if (!class_exists($route[AbstractRouting::CLASS_KEY])) {
            throw new InvalidControllerException('Controller does not exists: ' . $route[AbstractRouting::CLASS_KEY]);
        }

        $parameters = array_filter($items, function($value) {
            return $value !== null && $value !== false && $value !== '';
        });
        $controller = new $route[AbstractRouting::CLASS_KEY]($this->container);

        if (!method_exists($controller, $route[AbstractRouting::ACTION_KEY])) {
            throw new InvalidActionException('Action does not exists: ' . $route[AbstractRouting::ACTION_KEY]);
        }

        $parameters[] = $request->getBody();

        return new Route(
            $controller,
            $route[AbstractRouting::ACTION_KEY],
            $parameters
        );
    }
}
