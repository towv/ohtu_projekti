
<?php
class Status extends BaseModel{
    
    public $kayttaja_id, $lukuvinkki_id, $status;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    //Tallenna arvostelu
    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Status (kayttaja_id, lukuvinkki_id, status) VALUES (:kayttaja_id, :lukuvinkki_id, :arvostelu)');
        $query->execute(array(
            'kayttaja_id' => $this->kayttaja_id,
            'lukuvinkki_id' => $this->lukuvinkki_id,
            'status' => $this->status
        ));
        $row = $query->fetch();
    }
    
    //Palauttaa true, jos tietokannasta löytyy jo käyttäjän arvostelu 
    //tietylle kirjalle.
    public static function find($id, $kayttaja_id) {
        $query = DB::connection()->prepare('SELECT Status.* FROM Status WHERE Status.kayttaja_id = :kayttaja_id AND Status.lukuvinkki_id = :id LIMIT 1');
        $query->execute(array('id' => $id, 'kayttaja_id' => $kayttaja_id));
        $row = $query->fetch();
        
        if ($row){
            return true;
        }
        return false;
    }
    
    //Etsii käyttäjän arvostelun kirjalle.
    public static function findRating($id, $kayttaja_id) {
        $query = DB::connection()->prepare('SELECT Status.* FROM Status WHERE Status.kayttaja_id = :kayttaja_id AND Status.lukuvinkki_id = :id LIMIT 1');
        $query->execute(array('id' => $id, 'kayttaja_id' => $kayttaja_id));
        $row = $query->fetch();
        
        if ($row){
            $status = new Status(array(
                'kayttaja_id' => $row['kayttaja_id'],
                'lukuvinkki_id' => $row['lukuvinkki_id'],
                'status' => $row['status']
            ));
        return $rating;
        }
    }
    
    public function update($id, $kayttaja){
        $query = DB::connection()->prepare('UPDATE Status SET kayttaja_id = :kayttaja_id, lukuvinkki_id = :lukuvinkki_id, status = :status WHERE kayttaja_id = :kayttaja_id AND lukuvinkki_id = :lukuvinkki_id');
        $query->execute(array('lukuvinkki_id' => $id, 'kayttaja_id' => $kayttaja_id, 'status' => $this->status)); 
    }
    
    
}