<?php

namespace spec\DTH\LastFm\Api;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MethodSpec extends ObjectBehavior
{

    function let()
    {
        $this->beConstructedThrough('fromString', array('dummymethod'));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('DTH\LastFm\Api\Method');
    }

    function it_should_expose_the_api_key()
    {
        $this->__toString()->shouldReturn('dummymethod');
    }

}
