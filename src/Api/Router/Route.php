<?php

namespace Webpont\Test\Api\Router;

use Webpont\Test\Api\Contract\ControllerInterface;

class Route
{
    /**
     * @var ControllerInterface
     */
    private $controller;

    /**
     * @var string
     */
    private $action;

    /**
     * @var array
     */
    private $parameters;

    /**
     * Route constructor.
     *
     * @param ControllerInterface $controller
     * @param string $action
     * @param array $parameters
     */
    public function __construct(ControllerInterface $controller, string $action, array $parameters)
    {
        $this->controller = $controller;
        $this->action     = $action;
        $this->parameters = $parameters;
    }

    /**
     * @return ControllerInterface
     */
    public function getController(): ControllerInterface
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}
