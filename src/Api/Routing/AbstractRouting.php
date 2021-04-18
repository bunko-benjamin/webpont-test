<?php

namespace Webpont\Test\Api\Routing;

abstract class AbstractRouting
{
    const ROUTE_KEY     = 'route';
    const CLASS_KEY     = 'class';
    const ACTION_KEY    = 'action';
    const METHOD_KEY    = 'method';

    /**
     * @return array
     */
    abstract public function get(): array;
}
