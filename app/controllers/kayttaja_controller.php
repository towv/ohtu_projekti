<?php

class KayttajaController extends BaseController {

    public static function login() {
        View::make('kayttaja/login.html');
    }

    public static function create() {
        View::make('kayttaja/signup.html');
    }

    public static function store() {
        $params = $_POST;
        $attributes = array(
            'tunnus' => $params['tunnus'],
            'salasana' => $params['salasana']
        );
        $kayttaja = new Kayttaja($attributes);
        $errors = $kayttaja->errors();
        if (count($errors) == 0) {
            $kayttaja->save();
            Redirect::to('/lukuvinkki', array('message' => 'Käyttäjätunnus On Luotu Onnistuneesti!'));
        } else {
            View::make('kayttaja/signup.html', array('errors' => $errors));
        }
    }

    public static function logout() {
        $_SESSION['kayttaja'] = null;
        Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
    }

    public static function handle_login() {
        $params = $_POST;
        $kayttaja = Kayttaja::authenticate($params['tunnus'], $params['salasana']);
        if (!$kayttaja) {
            View::make('kayttaja/login.html', array('errors' => 'Väärä käyttäjätunnus tai salasana!', 'tunnus' => $params['tunnus']));
        } else {
            $_SESSION['kayttaja'] = $kayttaja->id;
            Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $kayttaja->tunnus . '!'));
        }
    }

    public static function show() {
        self::check_logged_in();
        $kayttaja = parent::get_user_logged_in();
        View::make('kayttaja/show.html', array('message' => 'Täällä ei ole vielä mitään!', 'kayttaja' => $kayttaja));
    }

    public static function lukuvinkkelit() {
        self::check_logged_in();
        $kayttaja = parent::get_user_logged_in();
        
        $vinkit = KayttajaLukuvinkki::findTips($kayttaja->id);
        
        View::make('kayttaja/vinkit.html', array('vinkit' => $vinkit, 'kayttaja' => $kayttaja));
    }

}
