<?php

class KayttajaLukuvinkki extends BaseModel{
    
    public $kayttaja_id, $lukuvinkki_id, $nimi, $tyyppi;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    public static function save($id, $kayttaja) {
        $query = DB::connection()->prepare('INSERT INTO KayttajaLukuvinkki (kayttaja_id, lukuvinkki_id) VALUES (:kayttaja_id, :lukuvinkki_id)');
        $query->execute(array(
            'kayttaja_id' => $kayttaja,
            'lukuvinkki_id' => $id
        ));
        $row = $query->fetch();
    }
    
    public static function findTips($id) {
        $query = DB::connection()->prepare('SELECT KayttajaLukuvinkki.*, Lukuvinkki.otsikko AS nimi, Lukuvinkki.tyyppi AS tyyppi FROM KayttajaLukuvinkki INNER JOIN Lukuvinkki ON Lukuvinkki.id = KayttajaLukuvinkki.lukuvinkki_id WHERE KayttajaLukuvinkki.kayttaja_id = :id');
        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();
        $tips = array();
        
        foreach ($rows as $row) {
            $tips[] = new KayttajaLukuvinkki(array(
                'kayttaja_id' => $row['kayttaja_id'],
                'lukuvinkki_id' => $row['lukuvinkki_id'],
                'nimi' => $row['nimi'],
                'tyyppi' => $row['tyyppi']
            ));
        }
        return $tips;
    }
    
    public static function find($id, $kayttaja) {
        $query = DB::connection()->prepare('SELECT * FROM KayttajaLukuvinkki WHERE lukuvinkki_id = :id AND kayttaja_id = :kayttaja_id LIMIT 1');
        $query->execute(array('id' => $id, 'kayttaja_id' => $kayttaja));
        $row = $query->fetch();
        $lukuvinkki = array();

        if ($row) {
            return true;
        }
        return null;
    }
    
    public static function destroy($id, $kayttaja){
        $query = DB::connection()->prepare('DELETE FROM KayttajaLukuvinkki WHERE kayttaja_id = :kayttaja AND lukuvinkki_id = :id ');
        $query->execute(array('kayttaja' => $kayttaja, 'id' => $id));
    }
    
}