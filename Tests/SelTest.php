<?php
require_once 'vendor/autoload.php';
class WebTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://laatopi.users.cs.helsinki.fi/tsoha/');
    }
    public function testTitle()
    {
        $this->url('http://laatopi.users.cs.helsinki.fi/tsoha/');
        $this->assertEquals('Gepardi-OhTu', $this->title());
    }
}
?>
