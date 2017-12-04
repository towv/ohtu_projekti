<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
require_once 'vendor/autoload.php';
require_once 'Tests/SelTest.php';


/**
 * Defines application features from the specific context.
 */
class FeatureContext extends PHPUnit_Framework_TestCase implements Context
{
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
      * @Given /"([^"]+)" is pressed/
      */
    public function IsPressed($key)
    {
        $myTest = new WebTest();
        $myTest->setUp();           // Your setup will always be called prior the test.
        $myTest->testSignUp();
        $myTest->tearDown();
    }

    /**
      * @When /username "([^"]+)" and password "([^"]+)" are entered/
      */
      public function usernameAndPassword($username, $password)
      {

      }

      /**
        * @Then /system will respond with "([^"]+)"/
        */
      public function systemWillRespond($response)
      {

      }
}
