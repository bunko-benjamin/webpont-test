<?php

namespace Webpont\Test\Api\Request;

use Webpont\Test\Api\Container\Container;
use Webpont\Test\Api\Contract\RequestInterface;

class Request implements RequestInterface
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @var array
     */
    private $data;

    /**
     * Request constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->data      = $_SERVER;
    }

    /**
     * @return string
     */
    public function getRequestMethod()
    {
        return strtolower($this->data['REQUEST_METHOD']);
    }

    /**
     * @return bool
     */
    public function isGetRequest()
    {
        return $this->getRequestMethod() === 'get';
    }

    /**
     * @return bool
     */
    public function isPostRequest()
    {
        return $this->getRequestMethod() === 'post';
    }

    /**
     * @return string
     */
    public function getUri()
    {
        $array = explode('/', trim(explode('?', $this->data['REQUEST_URI'])[0], '/'));

        return implode('/', $array);
    }

    /**
     * @return array
     */
    public function getBody()
    {
        $body = [];

        if ($this->isGetRequest()) {
            return $body;
        }

        foreach($_POST as $key => $value) {
            $body[$key] = $value;
        }

        return $body;
    }
}
