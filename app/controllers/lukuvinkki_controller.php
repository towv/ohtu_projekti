<?php

class LukuvinkkiController extends BaseController{
    
	public static function index(){
		$lukuvinkit = Lukuvinkki::all();
		View::make('lukuvinkki/index.html', array('lukuvinkit' => $lukuvinkit));
	}

	public static function show($id){
            $lukuvinkki = Lukuvinkki::find($id);
            $tags = LukuvinkkiTag::findTags($id);
            
            if ($tags == NULL) {
                $tags = "";
            }
            

            View::make('lukuvinkki/show.html', array('lukuvinkki' => $lukuvinkki, 'tags' => $tags));
	}

	public static function edit($id){
		$lukuvinkki = Lukuvinkki::find($id);
                $tags = Tag::all();
		View::make('lukuvinkki/edit.html', array('attributes' => $lukuvinkki, 'tags' => $tags));
	}

	public static function store() {
		$params = $_POST;
                $tags = Tag::all();
                
		$attributes = array(
                    'otsikko' => $params['otsikko'],
                    'tekija' => $params['tekija'],
                    'isbn' => $params['isbn'],
                    'url' => $params['url'],
                    'tyyppi' => $params['tyyppi'],
                    'kuvaus' => $params['kuvaus'],
                    'julkaistu' => $params['julkaistu']
		);
		$lukuvinkki = new Lukuvinkki($attributes);
                $tagit = $params['tagit'];
                
                
		$errors = $lukuvinkki->errors();

		if(count($errors) == 0){
                    $lukuvinkki->save();

                    try {
                        $tags = $params['tags'];

                        foreach ($tags as $tag) {
                            $tag = new LukuvinkkiTag(array('tag_id' => $tag, 'lukuvinkki_id' => $lukuvinkki->id));
                            $tag->save();
                        }
                        
                        $tagi = explode( ',', $tagit);
                        foreach($tagi as $t) {
                            $t = new Tag(array('nimi' => $t));
                            $t->save();
                            $tagid = $t->id;
                            $t = new LukuvinkkiTag(array('tag_id' => $tagid, 'lukuvinkki_id' => $lukuvinkki->id));
                            $t->save();
                        }
                        
                    } catch (Exception $ex) {

                    }
                    Redirect::to('/lukuvinkki/' . $lukuvinkki->id, array('message' => 'Lukuvinkki on lisätty!'));
		}else{
                    View::make('lukuvinkki/new.html', array('errors' => $errors, 'attributes' => $attributes, 'tags' => $tags));
		}
        
	}

	public static function onkoLuettu($lukuvinkki_id) {
		$query = DB::connection()->prepare('SELECT COUNT ( DISTINCT id) FROM Status INNER JOIN Status ON Status.kayttaja_id = :kayttaja_id AND Status.lukuvinkki_id = Status.id');
		$query -> execute(array('lukuvinkki_id' => $lukuvinkki_id));
		$status = $query->fetch();

		return $status;
	}

	public static function update(){
		$params = $_POST;
                $tags = Tag::all();
                
		$attributes = array(
                    'otsikko' => $params['otsikko'],
                    'tekija' => $params['tekija'],
                    'isbn' => $params['isbn'],
                    'url' => $params['url'],
                    'tyyppi' => $params['tyyppi'],
                    'kuvaus' => $params['kuvaus'],
                    'julkaistu' => $params['julkaistu']
		);

		$lukuvinkki = new Lukuvinkki($attributes);
                $tagit = $params['tagit'];
		$errors = $lukuvinkki->errors();

		if(count($errors) == 0){
                    $lukuvinkki->update($lukuvinkki->id);
                    LukuvinkkiTag::destroy($lukuvinkki->id);

                    try {
                        $tags = $params['tags'];

                        foreach ($tags as $tag) {
                            $tag = new LukuvinkkiTag(array('tag_id' => $tag, 'lukuvinkki_id' => $lukuvinkki->id));
                            $tag->save();
                        }
                        
                        $tagi = explode( ',', $tagit);
                        foreach( $tagi as $t ) {
                            $t = new Tag(array('nimi' => $t));
                            $t->save();
                        }
                    } catch (Exception $ex) {

                    }

                    Redirect::to('/lukuvinkki/' . $lukuvinkki->id, array('message' => 'Lukuvinkkiä on muokattu onnistuneesti!'));
		}else{
                    View::make('lukuvinkki/edit.html', array('errors' => $errors, 'attributes' => $attributes, 'tags' => $tags));
		}
	}

	public static function destroy($id){

		$lukuvinkki = new Lukuvinkki(array('id' => $id));
		$lukuvinkki->destroy();

		Redirect::to('/lukuvinkki', array('message' => 'Lukuvinkki on poistettu onnistuneesti!'));
	}

	public static function create() {
            $tags = Tag::all(); 
            View::make('lukuvinkki/new.html', array('tags' => $tags));
	}
 }
