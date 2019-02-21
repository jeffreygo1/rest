<?php

namespace go1\rest\wrapper\service;

class SwaggerPathBuilder
{
    private $swagger;
    private $config;

    public function __construct(SwaggerBuilder $swagger, &$config)
    {
        $this->swagger = $swagger;
        $this->config = &$config;
    }

    public function withSummary(string $value)
    {
        $this->config['summary'] = $value;

        return $this;
    }

    public function withParam(string $name)
    {
        $_ = count($this->config['parameters']) - 1;
        $this->config['parameters'][$_]['name'] = $name;

        return new SwaggerParamBuilder($this, $this->config['parameters'][$_]);
    }

    public function end()
    {
        return $this->swagger;
    }
}
