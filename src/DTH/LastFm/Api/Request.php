<?php

namespace DTH\LastFm\Api;

use GuzzleHttp\Client;

class Request
{

    /**
     * @var Endpoint
     */
    private $endpoint;
    /**
     * @var Method
     */
    private $method;
    /**
     * @var Format
     */
    private $format;
    /**
     * @var Client
     */
    private $client;

    public function __construct(Endpoint $endpoint, Method $method, Format $format, Client $client)
    {
        $this->endpoint = $endpoint;
        $this->method = $method;
        $this->format = $format;
        $this->client = $client;
    }

    public function request()
    {
        $response = $this->client->get($this->buildRequestUri());
        return $response->getBody()->getContents();
    }

    private function buildRequestUri()
    {
        return $this->endpoint
            ->withMethod($this->method)
            ->withFormat($this->format)
            ->build();
    }
}
