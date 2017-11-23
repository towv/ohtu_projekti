<?php
include("app/models/lukuvinkki.php");
include("lib/database.php");

class lukuvinkkiTest extends PHPUnit_Framework_TestCase
{

  public $lukuvinkki;

  public function setUp()
    {
       $this->lukuvinkki = new Lukuvinkki(array(
      'id' => '111',
      'otsikko' => 'samin kuntopolku',
      'tekija' => 'sami',
      'isbn' => '666',
      'url' => '',
      'tyyppi' => 'sci-fi',
      'kuvaus' => 'kuntoillaan yhdessä t sami',
      'julkaistu' => '1994'
    ));
    }


  public function testLuontiOnnistuuOikein()
  {
  

    

    $this->assertEquals("samin kuntopolku", $this->lukuvinkki->otsikko);
  }
  
  public function testSaveToimii() 
  {
    $query = DB::connection() -> prepare('INSERT INTO Lukuvinkki(otsikko, tekija, isbn, url, tyyppi, kuvaus, julkaistu) VALUES (:otsikko, :tekija, :isbn, :url, :tyyppi, :kuvaus, :julkaistu) RETURNING id');
    $query -> execute(array('otsikko' => $this->lukuvinkki->otsikko, 'tekija' => $this->lukuvinkki->tekija, 'isbn' => $this->lukuvinkki->isbn, 'url' => $this->lukuvinkki->url, 'tyyppi' => $this->lukuvinkki->tyyppi, 'kuvaus' => $this->lukuvinkki->kuvaus, 'julkaistu' => $this->lukuvinkki->julkaistu));
    $row = $query->fetch();
    $this->id = $row['id'];
  }

}
