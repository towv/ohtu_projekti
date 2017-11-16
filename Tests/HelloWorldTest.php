<?php

class KirjaTest extends PHPUnit_Framework_TestCase
{
    
    private $stub;

    public function setUp()
    {
        #$this->pdo = new PDO($GLOBALS['db_dsn'], $GLOBALS['db_username'], $GLOBALS['db_password']);
        #$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       #$this->pdo->query("CREATE TABLE Kirja (what VARCHAR(50) NOT NULL)");
    }

    public function tearDown()
    {
        $this->pdo->query("DROP TABLE Kirja");
    }

    public function testKirja()
    {
        $kirja = new Kirja($this->pdo);

        return true;
    }
}

