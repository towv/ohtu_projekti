<?php

class HelloWorldController extends BaseController{

  public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
    View::make('home.html');
  }

  public static function sandbox(){

    $tila = new Status(array(
      'kayttaja_id' =>'1',
      'lukuvinkki_id' => '1',
      'status' => 'true'
    ));

    $kayttaja = new Kayttaja(array(
      'id' =>'1',
      'tunnus' => 'matti',
      'salasana' => 'matti'
    ));

    $teos = new Lukuvinkki(array(
      'otsikko' =>'Introduction to the Theory of Computation',
      'tekija' => 'Michael Sipser',
      'isbn' => '978-1133187790',
      'tyyppi' => 'kirja',
      'kuvaus' => 'P=NP',
      'julkaistu' => "2013"
    ));


    $status = Status::find(1,1);
    Kint::dump($status);
    echo 'Hello World!';
  }
}
