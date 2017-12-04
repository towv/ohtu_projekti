<?php

class LukuvinkkiController extends BaseController {

    public static function index() {
        $lukuvinkit = Lukuvinkki::all();
        View::make('lukuvinkki/index.html', array('lukuvinkit' => $lukuvinkit));
    }

    public static function choose() {
        View::make('lukuvinkki/new.html');
    }

    public static function show($id) {
        $lukuvinkki = Lukuvinkki::find($id);
        $tags = LukuvinkkiTag::findTags($id);

        if ($tags == NULL) {
            $tags = "";
        }
        View::make('lukuvinkki/show.html', array('lukuvinkki' => $lukuvinkki, 'tags' => $tags));
    }

    public static function edit($id) {
        $lukuvinkki = Lukuvinkki::find($id);
        $tags = Tag::all();
        
        View::make('lukuvinkki/edit.html', array('attributes' => $lukuvinkki, 'tags' => $tags));
    }

    public static function storeKirja() {
        $params = $_POST;
        $tags = Tag::all();
        
        $attributes = array(
            'otsikko' => $params['otsikko'],
            'tekija' => $params['tekija'],
            'isbn' => $params['isbn'],
            'url' => null,
            'tyyppi' => $params['tyyppi'],
            'kuvaus' => $params['kuvaus'],
            'julkaistu' => $params['julkaistu'],
            'sarja' => null
        );

        $lukuvinkki = new Lukuvinkki($attributes);

        $tagit = $params['tagit'];

        $errors = $lukuvinkki->errors();

        if (count($errors) == 0) {
            $lukuvinkki->save();

            try {
                $tags = $params['tags'];

                foreach ($tags as $tag) {
                    $tag = new LukuvinkkiTag(array('tag_id' => $tag, 'lukuvinkki_id' => $lukuvinkki->id));
                    $tag->save();
                }

                $tagi = explode(',', $tagit);
                foreach ($tagi as $t) {
                    $t = new Tag(array('nimi' => $t));
                    $t->save();
                    $tagid = $t->id;
                    $t = new LukuvinkkiTag(array('tag_id' => $tagid, 'lukuvinkki_id' => $lukuvinkki->id));
                    $t->save();
                }
            } catch (Exception $ex) {
                
            }
            Redirect::to('/lukuvinkki/' . $lukuvinkki->id, array('message' => 'Lukuvinkki on lisätty!'));
        } else {
            View::make('lukuvinkki/kirja.html', array('errors' => $errors, 'attributes' => $attributes, 'tags' => $tags));
        }
    }

    public static function storePodcast() {
        $params = $_POST;
        $tags = Tag::all();
        
        $attributes = array(
            'otsikko' => $params['otsikko'],
            'tekija' => $params['tekija'],
            'isbn' => null,
            'url' => $params['url'],
            'tyyppi' => $params['tyyppi'],
            'kuvaus' => $params['kuvaus'],
            'julkaistu' => $params['julkaistu'],
            'sarja' => $params['sarja']
        );

        $lukuvinkki = new Lukuvinkki($attributes);

        $tagit = $params['tagit'];

        $errors = $lukuvinkki->errors();

        if (count($errors) == 0) {
            $lukuvinkki->save();

            try {
                $tags = $params['tags'];

                foreach ($tags as $tag) {
                    $tag = new LukuvinkkiTag(array('tag_id' => $tag, 'lukuvinkki_id' => $lukuvinkki->id));
                    $tag->save();
                }

                $tagi = explode(',', $tagit);
                foreach ($tagi as $t) {
                    $t = new Tag(array('nimi' => $t));
                    $t->save();
                    $tagid = $t->id;
                    $t = new LukuvinkkiTag(array('tag_id' => $tagid, 'lukuvinkki_id' => $lukuvinkki->id));
                    $t->save();
                }
            } catch (Exception $ex) {
                
            }
            Redirect::to('/lukuvinkki/' . $lukuvinkki->id, array('message' => 'Lukuvinkki on lisätty!'));
        } else {
            View::make('lukuvinkki/podcast.html', array('errors' => $errors, 'attributes' => $attributes, 'tags' => $tags));
        }
    }
    
    public static function storeBlogpost() {
        $params = $_POST;
        $tags = Tag::all();
        
        $attributes = array(
            'otsikko' => $params['otsikko'],
            'tekija' => $params['tekija'],
            'isbn' => null,
            'url' => $params['url'],
            'tyyppi' => $params['tyyppi'],
            'kuvaus' => $params['kuvaus'],
            'julkaistu' => $params['julkaistu'],
            'sarja' => $params['sarja']
        );

        $lukuvinkki = new Lukuvinkki($attributes);

        $tagit = $params['tagit'];

        $errors = $lukuvinkki->errors();

        if (count($errors) == 0) {
            $lukuvinkki->save();

            try {
                $tags = $params['tags'];

                foreach ($tags as $tag) {
                    $tag = new LukuvinkkiTag(array('tag_id' => $tag, 'lukuvinkki_id' => $lukuvinkki->id));
                    $tag->save();
                }

                $tagi = explode(',', $tagit);
                foreach ($tagi as $t) {
                    $t = new Tag(array('nimi' => $t));
                    $t->save();
                    $tagid = $t->id;
                    $t = new LukuvinkkiTag(array('tag_id' => $tagid, 'lukuvinkki_id' => $lukuvinkki->id));
                    $t->save();
                }
            } catch (Exception $ex) {
                
            }
            Redirect::to('/lukuvinkki/' . $lukuvinkki->id, array('message' => 'Lukuvinkki on lisätty!'));
        } else {
            View::make('lukuvinkki/blogpost.html', array('errors' => $errors, 'attributes' => $attributes, 'tags' => $tags));
        }
    }

    public static function storeVideo() {
        $params = $_POST;
        $tags = Tag::all();
        
        $attributes = array(
            'otsikko' => $params['otsikko'],
            'tekija' => $params['tekija'],
            'isbn' => null,
            'url' => $params['url'],
            'tyyppi' => $params['tyyppi'],
            'kuvaus' => $params['kuvaus'],
            'julkaistu' => $params['julkaistu'],
            'sarja' => null
        );

        $lukuvinkki = new Lukuvinkki($attributes);

        $tagit = $params['tagit'];

        $errors = $lukuvinkki->errors();

        if (count($errors) == 0) {
            $lukuvinkki->save();

            try {
                $tags = $params['tags'];

                foreach ($tags as $tag) {
                    $tag = new LukuvinkkiTag(array('tag_id' => $tag, 'lukuvinkki_id' => $lukuvinkki->id));
                    $tag->save();
                }

                $tagi = explode(',', $tagit);
                foreach ($tagi as $t) {
                    $t = new Tag(array('nimi' => $t));
                    $t->save();
                    $tagid = $t->id;
                    $t = new LukuvinkkiTag(array('tag_id' => $tagid, 'lukuvinkki_id' => $lukuvinkki->id));
                    $t->save();
                }
            } catch (Exception $ex) {
                
            }
            Redirect::to('/lukuvinkki/' . $lukuvinkki->id, array('message' => 'Lukuvinkki on lisätty!'));
        } else {
            View::make('lukuvinkki/video.html', array('errors' => $errors, 'attributes' => $attributes, 'tags' => $tags));
        }
    }

    public static function onkoLuettu($lukuvinkki_id) {
        $query = DB::connection()->prepare('SELECT COUNT ( DISTINCT id) FROM Status INNER JOIN Status ON Status.kayttaja_id = :kayttaja_id AND Status.lukuvinkki_id = Status.id');
        $query->execute(array('lukuvinkki_id' => $lukuvinkki_id));
        $status = $query->fetch();

        return $status;
    }

    public static function update($id) {
        $params = $_POST;
        $tags = Tag::all();
        $vinkki = Lukuvinkki::find($id);
        $tyyppi = $vinkki->tyyppi;

        if ($tyyppi == 'kirja') {
            $attributes = array(
                'otsikko' => $params['otsikko'],
                'tekija' => $params['tekija'],
                'isbn' => $params['isbn'],
                'url' => null,
                'tyyppi' => $tyyppi,
                'kuvaus' => $params['kuvaus'],
                'julkaistu' => $params['julkaistu'],
                'sarja' => null
            );
        } else if ($tyyppi == 'video') {
            $attributes = array(
                'otsikko' => $params['otsikko'],
                'tekija' => $params['tekija'],
                'isbn' => null,
                'url' => $params['url'],
                'tyyppi' => $tyyppi,
                'kuvaus' => $params['kuvaus'],
                'julkaistu' => $params['julkaistu'],
                'sarja' => null
            );
        } else {
            $attributes = array(
                'otsikko' => $params['otsikko'],
                'tekija' => $params['tekija'],
                'isbn' => null,
                'url' => $params['url'],
                'tyyppi' => $tyyppi,
                'kuvaus' => $params['kuvaus'],
                'julkaistu' => $params['julkaistu'],
                'sarja' => $params['sarja']
            );
        }

        $lukuvinkki = new Lukuvinkki($attributes);
        $errors = $lukuvinkki->errors();

        if (count($errors) == 0) {
            $lukuvinkki->update($id);
            LukuvinkkiTag::destroy($id);

            try {
                $tags = $params['tags'];

                foreach ($tags as $tag) {
                    $tag = new LukuvinkkiTag(array('tag_id' => $tag, 'lukuvinkki_id' => $id));
                    $tag->save();
                }

                $tagi = explode(',', $tagit);
                foreach ($tagi as $t) {
                    $t = new Tag(array('nimi' => $t));
                    $t->save();
                    $tagid = $t->id;
                    $t = new LukuvinkkiTag(array('tag_id' => $tagid, 'lukuvinkki_id' => $id));
                    $t->save();
                }
            } catch (Exception $ex) {
                
            }

            Redirect::to('/lukuvinkki/' . $id, array('message' => 'Lukuvinkkiä on muokattu onnistuneesti!'));
        } else {
            View::make('lukuvinkki/edit.html', array('errors' => $errors, 'attributes' => $attributes, 'tags' => $tags));
        }
    }

    public static function destroy($id) {
        $lukuvinkki = new Lukuvinkki(array('id' => $id));
        $lukuvinkki->destroy();

        Redirect::to('/lukuvinkki', array('message' => 'Lukuvinkki on poistettu onnistuneesti!'));
    }

    public static function createKirja() {
        $tags = Tag::all();
        View::make('lukuvinkki/kirja.html', array('tags' => $tags));
    }
    
    public static function createPodcast() {
        $tags = Tag::all();
        View::make('lukuvinkki/podcast.html', array('tags' => $tags));
    }
    
    public static function createBlogpost() {
        $tags = Tag::all();
        View::make('lukuvinkki/blogpost.html', array('tags' => $tags));
    }
    
    public static function createVideo() {
        $tags = Tag::all();
        View::make('lukuvinkki/video.html', array('tags' => $tags));
    }

    public static function vinkkelit($id) {
        $kayttaja = parent::get_user_logged_in();
        $lukuvinkki = Lukuvinkki::find($id);
        $vinkki = new KayttajaLukuvinkki(array(
            'kayttaja_id' => $kayttaja->id,
            'lukuvinkki_id' => $id
        ));
        if (!KayttajaLukuvinkki::find($id, $kayttaja->id)) {
            $vinkki->save($id, $kayttaja->id);


            Redirect::to('/user', array('message' => 'Lukuvinkki on lisätty käyttäjälle onnistuneesti!'));
        }
        Redirect::to('/user', array('error' => 'Lukuvinkki on jo lisätty käyttäjälle!'));
    }

    public static function vinkkeliPoisto($id) {
        $kayttaja = parent::get_user_logged_in();
        $lukuvinkki = Lukuvinkki::find($id);
        $vinkki = new KayttajaLukuvinkki(array(
            'kayttaja_id' => $kayttaja->id,
            'lukuvinkki_id' => $id
        ));
        $vinkki->destroy($id, $kayttaja->id);

        Redirect::to('/user', array('message' => 'Lukuvinkki on poistettu'));
    }

}
