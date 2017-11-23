<?php
class StatusController extends BaseController{
    
    //Tallentaa käyttäjän arvosanan kirjalle
    public static function store($id) {
        self::check_logged_in();
        
        $params = $_POST;
        $lukuvinkki = $id;
        $kayttaja_id = self::get_user_logged_in()->id;
        $arvostelu = $params['rating'];
        
        $rating = new Status(array(
        'kayttaja_id' => $kayttaja_id,
        'lukuvinkki' => $lukuvinkki,
        'Status' => $status
        ));
        
        if ($status->find($kayttaja_id, $lukuvinkki)) {
            $status->update($kayttaja_id, $lukuvinkki);
        } else {
            $status->save();
        }
        Redirect::to('/books', array('message' => 'Your status has been counted'));
    }
    
    
}