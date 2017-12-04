<?php
require_once 'vendor/autoload.php';
class WebTest extends PHPUnit_Framework_TestCase
{

  /**
   * @var \RemoteWebDriver
   */
    protected function setUp()
    {
        $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'chrome');
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
    }

    protected $url = 'http://laatopi.users.cs.helsinki.fi/tsoha/';

    public function testTitle()
    {
        $this->webDriver->get($this->url);
        $this->assertContains('Gepardi-OhTu', $this->webDriver->getTitle());
    }

    public function tearDown()
    {
        $this->webDriver->quit();
    }

    public function testSignUp()
    {
      $this->webDriver->get($this->url);
      sleep(5);
      $search = $this->webDriver->findElement(WebDriverBy::id('signup'));
      $search->click();
      sleep(5);
      $search = $this->webDriver->findElement(WebDriverBy::id('tunnus'));
      $search->click();
      $this->webDriver->getKeyboard()->sendKeys('php-webdriver');
      $search = $this->webDriver->findElement(WebDriverBy::id('salasana'));
      $search->click();
      $this->webDriver->getKeyboard()->sendKeys('php-webdriver');
      $search = $this->webDriver->findElement(WebDriverBy::id('submit'));
      $search->click();
      sleep(5);
    }

}
?>
