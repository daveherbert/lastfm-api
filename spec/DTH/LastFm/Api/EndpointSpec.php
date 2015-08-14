<?php

namespace spec\DTH\LastFm\Api;

use DTH\LastFm\Api\Format;
use DTH\LastFm\Api\Key;
use DTH\LastFm\Api\Method;
use DTH\LastFm\User\Username;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EndpointSpec extends ObjectBehavior
{

    function it_should_create_an_endpoint_builder()
    {
        self::builder()->shouldBeAnInstanceOf('DTH\LastFm\Api\Endpoint');
    }

    function it_should_build_an_endpoint()
    {
        self::builder()->build()->shouldBe(\DTH\LastFm\Api\Endpoint::LASTFM_API_ROOT);
    }

    function it_should_contain_the_username()
    {
        $username = Username::fromString('test');
        self::builder()->withUsername($username)->build()->shouldMatch('/user=test/');
    }

    function it_should_contain_the_api_key()
    {
        $key = Key::fromString('apikey');
        self::builder()->withKey($key)->build()->shouldMatch('/api_key=apikey/');
    }

    function it_should_format_as_json()
    {
        $format = Format::fromString('json');
        self::builder()->withFormat($format)->build()->shouldMatch('/format=json/');
    }


    function it_should_have_an_api_key_and_a_username()
    {
        $key = Key::fromString('apikey');
        $username = Username::fromString('test');
        self::builder()
            ->withKey($key)
            ->withUsername($username)
            ->build()
            ->shouldMatch('/\?api_key=apikey&user=test/');
    }

    function it_should_have_a_method()
    {
        $method = Method::fromString('methodname');
        self::builder()->withMethod($method)->build()->shouldMatch('/method=methodname/');
    }


}
