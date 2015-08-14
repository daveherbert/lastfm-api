<?php

namespace DTH\LastFm\Api;

use DTH\LastFm\User\Username;

class Endpoint
{

    const LASTFM_API_ROOT = 'http://ws.audioscrobbler.com/2.0/';

    private $endpoint;

    public function __construct()
    {
        $this->endpoint = self::LASTFM_API_ROOT;
    }

    public static function builder()
    {
        return new Endpoint();
    }

    public function build()
    {
        return $this->endpoint;
    }

    public function withUsername(Username $username)
    {
        $this->addParam('user', (string) $username);
        return $this;
    }

    public function withKey(Key $key)
    {
        $this->addParam('api_key', (string) $key);
        return $this;
    }

    public function withMethod(Method $method)
    {
        $this->addParam('method', (string) $method);
        return $this;
    }

    public function withFormat(Format $format)
    {
        $this->addParam('format', (string) $format);
        return $this;
    }

    private function addParam($param, $value)
    {
        $delimiter = (strpos($this->endpoint, '?') === false) ? '?' : '&';
        $this->endpoint .= $delimiter . $param . '=' . $value;
    }
}
