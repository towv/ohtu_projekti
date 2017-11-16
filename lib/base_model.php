<?php

  class BaseModel{
    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

    public function __construct($attributes = null){
      // Käydään assosiaatiolistan avaimet läpi
      foreach($attributes as $attribute => $value){
        // Jos avaimen niminen attribuutti on olemassa...
        if(property_exists($this, $attribute)){
          // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
          $this->{$attribute} = $value;
        }
      }
    }

    public function errors(){
      // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
      $errors = array();

      foreach($this->validators as $validator){
        $errors = array_merge($errors, $this->{$validator}());
      }

      return $errors;
    }
    
    public function validate_name() {
        $errors = array();
        
        if($this->otsikko == '' || $this->otsikko == null){
            $errors[] = 'Otsikko ei voi olla tyhjä.';
        }
        if(strlen($this->otsikko) < 3){
            $errors[] = 'Otsikon pitää olla vähintään 3 merkkiä.';
        }
        if(strlen($this->otsikko) > 50){
            $errors[] = 'Otsikko saa olla korkeintaan 50.';
        }
        return $errors;
    }
    
    public function validate_isbn() {
        $errors = array();
        
        if($this->isbn == '' || $this->isbn == null){
            $errors[] = 'ISBN ei voi olla tyhjä.';
        }
        if(strlen($this->isbn) != 13){
            $errors[] = 'ISBN pitäisi olla 13 merkkiä.';
        }
        if(!ctype_digit($this->isbn) ){
            $errors[] = 'ISBN pitäisi olla pelkkiä numeroita';
        }
        return $errors;
    }
    
    public function validate_writer() {
        $errors = array();
        
        if($this->kirjoittaja == '' || $this->kirjoittaja == null){
            $errors[] = 'Kirjoittaja ei voi olla tyhjä.';
        }
        if(strlen($this->kirjoittaja) < 3){
            $errors[] = 'Kirjoittajan pitää olla vähintään 3 merkkiä.';
        }
        if(strlen($this->kirjoittaja) > 50){
            $errors[] = 'Kirjoittaja saa olla korkeintaan 50 merkkiä.';
        }
        return $errors;
    }

  }
