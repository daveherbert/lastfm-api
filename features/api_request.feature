Feature: Make an API request

  Scenario: Requesting recent tracks for a user
    Given I have a username and an API key
    When I request the method "user.getrecenttracks"
    Then the recent tracks should be requested
