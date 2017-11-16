<?php

class KirjaController extends BaseController{
	public static function index(){
		$kirjat = Kirja::all();
		View::make('kirja/index.html', array('kirjat' => $kirjat));
	}

	public static function show($id){
		$kirja = Kirja::find($id);
		View::make('kirja/show.html', array('kirja' => $kirja));
	}

	public static function edit($id){
		$kirja = Kirja::find($id);

		View::make('kirja/edit.html', array('attributes' => $kirja));
	}

	public static function store() {
		$params = $_POST;

		$attributes = array(
			'otsikko' => $params['otsikko'],
			'kirjoittaja' => $params['kirjoittaja'],
			'isbn' => $params['isbn']
		);
		$kirja = new Kirja($attributes);
		$errors = $kirja->errors();

		if(count($errors) == 0){
			$kirja->save();
			Redirect::to('/kirja/' . $kirja->id, array('message' => 'Kirja On Lisätty Järjestelmään!'));
		}else{
			View::make('kirja/new.html', array('errors' => $errors, 'attributes' => $attributes));
		}
	}

	public static function update($id){
		$params = $_POST;
		$attributes = array(
			'id' => $id,
			'otsikko' => $params['otsikko'],
			'kirjoittaja' => $params['kirjoittaja'],
			'isbn' => $params['isbn']
		);

		$kirja = new Kirja($attributes);
		$errors = $kirja->errors();

		if(count($errors) == 0){
			$kirja->update();
			Redirect::to('/kirja/' . $kirja->id, array('message' => 'Kirja on muokattu onnistuneesti!'));
		}else{
			View::make('kirja/'.$kirja->id.'edit.html', array('errors' => $errors, 'attributes' => $attributes));
		}
	}

	public static function destroy($id){
		
		$kirja = new Kirja(array('id' => $id));
		$kirja->destroy();

		Redirect::to('/kirja', array('message' => 'Kirja on poistettu onnistuneesti!'));
	}

	public static function create() {
		View::make('kirja/new.html');
	}
}