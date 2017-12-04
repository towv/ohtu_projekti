<?php

$routes->get('/', function() {
    LukuvinkkiController::index();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});


//Lukuvinkit

$routes->get('/lukuvinkki', function() {
    LukuvinkkiController::index();
});

$routes->get('/lukuvinkki/new', function() {
    LukuvinkkiController::create();
});

$routes->get('/lukuvinkki/:id', function($id) {
    LukuvinkkiController::show($id);
});

$routes->post('/lukuvinkki/:id/edit', function($id) {
    LukuvinkkiController::update($id);
});

$routes->get('/lukuvinkki/:id/edit', function($id) {
    LukuvinkkiController::edit($id);
});

$routes->post('/lukuvinkki/:id/destroy', function($id) {
    LukuvinkkiController::destroy($id);
});

$routes->post('/lukuvinkki/:id/add', function($id) {
    LukuvinkkiController::vinkkelit($id);
});

$routes->post('/lukuvinkki/:id/delete', function($id) {
    LukuvinkkiController::vinkkeliPoisto($id);
});

$routes->post('/lukuvinkki', function() {
    LukuvinkkiController::store();
});

// Kirjautuminen

$routes->get('/login', function() {
    KayttajaController::login();
});
$routes->get('/signup', function() {
    KayttajaController::create();
});
$routes->post('/signup', function() {
    KayttajaController::store();
});
$routes->get('/user', function() {
    KayttajaController::lukuvinkkelit();
});
$routes->get('/kayttaja/:id', function() {
    KayttajaController::show();
});
$routes->post('/login', function() {
    KayttajaController::handle_login();
});
$routes->post('/logout', function() {
    KayttajaController::logout();
});
