<?php

namespace Webpont\Test\Api\Contract;

use Webpont\Test\Api\Response\Response;

interface ResponseInterface
{
    /**
     * @param int $statusCode
     *
     * @return Response
     */
    public function withStatus(int $statusCode): Response;

    /**
     * @param array $data
     */
    public function toJson(array $data);

    /**
     * @param string $content
     */
    public function toHtml(string $content);

    /**
     * @param string $templateName
     * @param array  $data
     */
    public function fromTemplate(string $templateName, array $data);
}
