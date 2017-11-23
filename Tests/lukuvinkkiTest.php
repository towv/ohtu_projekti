<?php
include("app/models/lukuvinkki.php");

class lukuvinkkiTest extends PHPUnit_Framework_TestCase
{
  public function testLuontiOnnistuuOikein()
  {
    $lukuvinkki = new Lukuvinkki(array(
      'id' => '111',
      'otsikko' => 'samin kuntopolku',
      'tekija' => 'sami',
      'isbn' => '666',
      'url' => '',
      'tyyppi' => 'sci-fi',
      'kuvaus' => 'kuntoillaan yhdessä t sami',
      'julkaistu' => '1994'
    ));
    $result = $lukuvinkki->otsikko;

    $this->assertEquals("samin kuntopolku", $result);
  }

}
