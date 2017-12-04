<?php
require_once 'vendor/autoload.php';
class WebTest extends PHPUnit_Framework_TestCase
{

  /**
   * @var \RemoteWebDriver
   */
    protected function setUp()
    {
        $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
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

    // public function testLoginButton()
    // {
    //   $this->webDriver->get($this->url);
    //   sleep(5);
    //   $search = $this->webDriver->findElement(WebDriverBy::id('btn btn-primary'));
    //   $search->click();
    // }

}
?>
