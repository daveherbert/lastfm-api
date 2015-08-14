<?php

namespace DTH\LastFm\User;

class Username
{

    private $username;

    private function __construct($username)
    {
        $this->username = (string) $username;
    }

    public static function fromString($username)
    {
        return new Username($username);
    }

    public function __toString()
    {
        return $this->username;
    }
}
