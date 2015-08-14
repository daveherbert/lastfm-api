<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use DTH\LastFm\Api\Endpoint;
use DTH\LastFm\Api\Format;
use DTH\LastFm\Api\Key;
use DTH\LastFm\Api\Method;
use DTH\LastFm\Api\Request;
use DTH\LastFm\User\Username;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{

    /**
     * @var Endpoint
     */
    private $endpoint;

    private $response;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I have a username and an API key
     */
    public function iHaveAUsernameAndAnApiKey()
    {
        if (!array_key_exists('LASTFM_USERNAME', $_SERVER) || !array_key_exists('LASTFM_API_KEY', $_SERVER)) {
            throw new \RuntimeException('LastFM username and API key must be set in the environment.');
        }

        $this->endpoint = Endpoint::builder()
            ->withUsername(Username::fromString($_SERVER['LASTFM_USERNAME']))
            ->withKey(Key::fromString($_SERVER['LASTFM_API_KEY']));
    }

    /**
     * @When I request the method :methodName
     */
    public function iRequestTheMethod($methodName)
    {
        $request = new Request(
            $this->endpoint,
            Method::fromString($methodName),
            Format::fromString('json'),
            new \GuzzleHttp\Client()
        );
        $this->response = $request->request();
    }

    /**
     * @Then the recent tracks should be requested
     */
    public function theRecentTracksShouldBeRequested()
    {
        expect($this->response)->toBeString();
    }
}
