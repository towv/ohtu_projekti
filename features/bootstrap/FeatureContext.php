<?php



use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
require_once 'vendor/autoload.php';
require_once 'Tests/SelTest.php';


/**
 * Defines application features from the specific context.
 */
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
        $host = 'http://localhost:4444/wd/hub'; // this is the default
        $capabilities = DesiredCapabilities::firefox();
        $driver = RemoteWebDriver::create($host, $capabilities, 5000);
        // navigate to 'http://www.seleniumhq.org/'
        $driver->get('http://www.seleniumhq.org/');

    }

    /**
     * @Given kirjaudu sisaan is pressed
     */
    public function kirjauduSisaanIsPressed()

    {
      //  $myTest = new WebTest();
        //$myTest->setUp();           // Your setup will always be called prior the test.
        //$myTest->prepareSession();  // Specific to Selenium test case, called from `runTest` method.
        //$myTest->testTitle();
       
    }

    



}

