<?php

namespace DTH\LastFm\Api;

class Format
{
    private $format;
    private static $validFormats = array('json', 'xml');

    private function __construct($format)
    {
        $this->format = (string) $format;
    }

    public static function fromString($format)
    {
        if (!in_array($format, self::$validFormats)) {
            throw new \InvalidArgumentException(sprintf('Format "%s" is not supported.', $format));
        }
        return new Format($format);
    }

    public function __toString()
    {
        return $this->format;
    }
}
