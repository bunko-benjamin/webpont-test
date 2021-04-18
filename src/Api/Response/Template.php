<?php

namespace Webpont\Test\Api\Response;

class Template
{
    /**
     * @var string
     */
    private $templateName;

    /**
     * @var array
     */
    private $data;

    /**
     * Template constructor.
     *
     * @param string $templateName
     * @param array $data
     */
    public function __construct(string $templateName, array $data)
    {
        $this->templateName = $templateName;
        $this->data         = $data;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        ob_start();
        extract($this->data);
        include __DIR__ . '/../../View/' . $this->templateName . '.php';
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
