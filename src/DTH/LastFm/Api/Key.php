<?php

namespace DTH\LastFm\Api;

class Key
{

    private $apiKey;

    private function __construct($apiKey)
    {
        $this->apiKey = (string) $apiKey;
    }

    public static function fromString($apiKey)
    {
        return new Key($apiKey);
    }

    public function __toString()
    {
        return $this->apiKey;
    }
}
