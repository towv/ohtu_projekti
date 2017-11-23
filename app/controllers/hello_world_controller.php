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
      'otsikko' =>'kirja',
      'tekija' => 'jeesus',
      'isbd' => '666',
      'tyyppi' => 'kirja',
      'kuvaus' => 'tosi hyvä kirja',
      'julkaistu' => "5"
    ));


    $status = Status::find(1,1);
    Kint::dump($status);
    echo 'Hello World!';
  }
}
