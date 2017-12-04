<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

require_once 'vendor/autoload.php';
require_once 'Tests/SelTest.php';

/**
 * Defines application features from the specific context.
 */

class FeatureContext implements Context

class FeatureContext extends PHPUnit_Extensions_Selenium2TestCase implements Context

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
         * @When username :arg1 and password :arg2 are entered
         */
    public function usernameAndPasswordAreEntered2($arg1, $arg2)
    {
        print("Jees");
    }
}




    /**
     * @Given kirjaudu sisaan is pressed
     */
    public function kirjauduSisaanIsPressed()

    {
        $myTest = new WebTest();
        $myTest->setUp();           // Your setup will always be called prior the test.
        $myTest->prepareSession();  // Specific to Selenium test case, called from `runTest` method.
        $myTest->testTitle();

    }