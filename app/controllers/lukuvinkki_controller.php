<?php

class LukuvinkkiController extends BaseController{
	public static function index(){
		$lukuvinkit = Lukuvinkki::all();
		View::make('lukuvinkki/index.html', array('lukuvinkit' => $lukuvinkit));
	}

	public static function show($id){
		$lukuvinkki = Lukuvinkki::find($id);
		View::make('lukuvinkki/show.html', array('lukuvinkki' => $lukuvinkki));
	}

	public static function edit($id){
		$lukuvinkki = Lukuvinkki::find($id);

		View::make('lukuvinkki/edit.html', array('attributes' => $lukuvinkki));
	}

	public static function store() {
		$params = $_POST;

		$attributes = array(
                    'otsikko' => $row['otsikko'],
                    'tekija' => $row['tekija'],
                    'isbn' => $row['isbn'],
                    'url' => $row['url'],
                    'tyyppi' => $row['tyyppi'],
                    'kuvaus' => $row['kuvaus'],
                    'julkaistu' => $row['julkaistu']
		);
		$lukuvinkki = new Lukuvinkki($attributes);
		$errors = $lukuvinkki->errors();

		if(count($errors) == 0){
			$lukuvinkki->save();
			Redirect::to('/lukuvinkki/' . $kirja->id, array('message' => 'Lukuvinkki on lisätty!'));
		}else{
			View::make('lukuvinkki/new.html', array('errors' => $errors, 'attributes' => $attributes));
		}
	}

	public static function onkoLuettu($lukuvinkki_id) {
		$query = DB::connection()->prepare('SELECT COUNT ( DISTINCT id) FROM Status INNER JOIN Kurssiaihe ON Status.kayttaja_id = :kayttaja_id AND Status.lukuvinkki_id = Status.id');
		$query -> execute(array('lukuvinkki_id' => $lukuvinkki_id));
		$status = $query->fetch();

		return $status[0];
	}

	public static function update($id){
		$params = $_POST;
                
		$attributes = array(
                    'otsikko' => $row['otsikko'],
                    'tekija' => $row['tekija'],
                    'isbn' => $row['isbn'],
                    'url' => $row['url'],
                    'tyyppi' => $row['tyyppi'],
                    'kuvaus' => $row['kuvaus'],
                    'julkaistu' => $row['julkaistu']
		);

		$lukuvinkki = new Lukuvinkki($attributes);
		$errors = $lukuvinkki->errors();

		if(count($errors) == 0){
			$lukuvinkki->update();
			Redirect::to('/lukuvinkki/' . $lukuvinkki->id, array('message' => 'Lukuvinkki on muokattu onnistuneesti!'));
		}else{
			View::make('lukuvinkki/edit.html', array('errors' => $errors, 'attributes' => $attributes));
		}
	}

	public static function destroy($id){

		$lukuvinkki = new Lukuvinkki(array('id' => $id));
		$lukuvinkki->destroy();

		Redirect::to('/lukuvinkki', array('message' => 'Lukuvinkki on poistettu onnistuneesti!'));
	}

	public static function create() {
		View::make('lukuvinkki/new.html');
	}
 }
