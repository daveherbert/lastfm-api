<?php

namespace spec\DTH\LastFm\Api;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class KeySpec extends ObjectBehavior
{

    function let()
    {
        $this->beConstructedThrough('fromString', array('dummyapikey'));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('DTH\LastFm\Api\Key');
    }

    function it_should_expose_the_api_key()
    {
        $this->__toString()->shouldReturn('dummyapikey');
    }

}
