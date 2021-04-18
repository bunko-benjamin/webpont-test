<?php

namespace Webpont\Test\Api\Container;

class Container
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * @param string $key
     * @param $data
     */
    public function add(string $key, $data)
    {
        $this->data[$key] = $data;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key)
    {
        return isset($this->data[$key]);
    }

    /**
     * @param string $key
     *
     * @return mixed|null
     */
    public function get(string $key) {
        return $this->has($key) ? $this->data[$key] : null;
    }
}
