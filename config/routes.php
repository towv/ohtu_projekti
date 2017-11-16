<?php

$routes->get('/', function() {
	HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
	HelloWorldController::sandbox();
});

  //Kirjat

$routes->get('/kirja', function(){
	KirjaController::index();
});

$routes ->get('/kirja/new', function() {
	KirjaController::create();
});

$routes->get('/kirja/:id', function($id){
	KirjaController::show($id);
});

$routes->get('/kirja/:id/edit', function($id) {
	KirjaController::edit($id);
});

$routes->post('/kirja/:id/edit', function($id) {
	KirjaController::update($id);
});

$routes->post('/kirja/:id/destroy',function($id) {
	KirjaController::destroy($id);
});

$routes ->post('/kirja', function() {
	KirjaController::store();
});
