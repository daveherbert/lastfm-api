<?php

namespace spec\DTH\LastFm\Api;

use DTH\LastFm\Api\Endpoint;
use DTH\LastFm\Api\Format;
use DTH\LastFm\Api\Method;
use GuzzleHttp\Client;
use GuzzleHttp\Message\ResponseInterface;
use GuzzleHttp\Stream\StreamInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RequestSpec extends ObjectBehavior
{

    function let(Client $client, Endpoint $endpoint, Format $format)
    {
        $method = Method::fromString('user.getrecenttracks');
        $format = Format::fromString('json');

        $this->beConstructedWith($endpoint, $method, $format, $client);
    }

    function it_should_make_a_request(Client $client, $endpoint, ResponseInterface $response, StreamInterface $body)
    {
        $requestUri = Endpoint::LASTFM_API_ROOT . '?method=user.getrecenttracks';
        $endpoint->withMethod(Method::fromString('user.getrecenttracks'))
            ->shouldBeCalled()
            ->willReturn($endpoint);
        $endpoint->withFormat(Format::fromString('json'))
            ->shouldBeCalled()
            ->willReturn($endpoint);
        $endpoint->build()->shouldBeCalled()->willReturn($requestUri);

        $client->get($requestUri)->shouldBeCalled()->willReturn($response);
        $response->getBody()->willReturn($body);
        $body->getContents()->willReturn('foo');

        $this->request();

    }
}
