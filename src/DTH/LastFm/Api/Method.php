<?php

namespace DTH\LastFm\Api;

class Method
{

    private $method;

    private function __construct($method)
    {
        $this->method = (string) $method;
    }

    public static function fromString($method)
    {
        return new Method($method);
    }

    public function __toString()
    {
        return $this->method;
    }
}
