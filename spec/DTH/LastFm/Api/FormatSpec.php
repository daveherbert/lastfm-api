<?php

namespace spec\DTH\LastFm\Api;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FormatSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('fromString', array('json'));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('DTH\LastFm\Api\Format');
    }

    function it_should_expose_the_format()
    {
        $this->__toString()->shouldReturn('json');
    }

    function it_should_allow_json_format()
    {
        $this->beConstructedThrough('fromString', array('json'));
        $this->__toString()->shouldReturn('json');
    }

    function it_should_allow_xml_format()
    {
        $this->beConstructedThrough('fromString', array('xml'));
        $this->__toString()->shouldReturn('xml');
    }

    function it_should_throw_an_exception_for_an_invalid_format()
    {
        $this->shouldThrow('\InvalidArgumentException')->during('fromString', array('html'));
    }

}
