<?php

$routes->get('/', function() {
	LukuvinkkiController::index();
});

  //Kirjat

$routes->get('/lukuvinkki', function(){
        LukuvinkkiController::index();
});

$routes ->get('/lukuvinkki/new', function() {
	LukuvinkkiController::create();
});

$routes->get('/lukuvinkki/:id', function($id){
	LukuvinkkiController::show($id);
});

$routes->get('/lukuvinkki/:id/edit', function($id) {
	LukuvinkkiController::edit($id);
});

$routes->post('/lukuvinkki/:id/edit', function($id) {
	LukuvinkkiController::update($id);
});

$routes->post('/lukuvinkki/:id/destroy',function($id) {
	LukuvinkkiController::destroy($id);
});

$routes ->post('/lukuvinkki', function() {
	LukuvinkkiController::store();
});
