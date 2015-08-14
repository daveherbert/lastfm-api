<?php

namespace spec\DTH\LastFm\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UsernameSpec extends ObjectBehavior
{

    private $username = 'dummyusername';

    function let()
    {
        $this->beConstructedThrough('fromString', array($this->username));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('DTH\LastFm\User\Username');
    }

    function it_should_expose_the_api_key()
    {
        $this->__toString()->shouldReturn($this->username);
    }

}
