<?php

namespace Webpont\Test\Api\Response;

use Webpont\Test\Api\Container\Container;
use Webpont\Test\Api\Contract\ResponseInterface;

class Response implements ResponseInterface
{
    /**
     * @var Container
     */
    private $container;

    /**
     * Response constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param int $statusCode
     *
     * @return Response
     */
    public function withStatus(int $statusCode): Response
    {
        http_response_code($statusCode);

        return $this;
    }

    /**
     * @param array $data
     */
    public function toJson(array $data)
    {
        header('Content-type: application/json');

        echo json_encode($data);
    }

    /**
     * @param string $content
     */
    public function toHtml(string $content)
    {
        echo $content;
    }

    /**
     * @param string $templateName
     * @param array  $data
     */
    public function fromTemplate(string $templateName, array $data)
    {
        $template = new Template($templateName, $data);

        echo $template->getContent();
    }
}
