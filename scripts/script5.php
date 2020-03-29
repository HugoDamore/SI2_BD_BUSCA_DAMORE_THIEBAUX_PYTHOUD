<?php

require_once __DIR__ . '/../vendor/autoload.php';

\games\AppConf::addDbConf('../config/conf.ini');

$app = new \Slim\Slim();

$app->get('/api/games/:id', function($id){
	(new \games\control\GamesController())->getGame($id);
})->name('game');

$app->get('/api/games/', function(){
	(new \games\control\GamesController())->getGames();
})->name('games');

$app->get('/api/games/:id/comments', function($id){
	(new \games\control\GamesController())->getComments($id);
})->name('comments');

$app->get('/api/platform/:id', function($id){
	(new \games\control\GamesController())->getPlatform($id);
})->name('platform');

$app->get('/api/games/:id/characters', function($id) {
    (new \games\control\GamesController())->getCharacters($id);
})->name('characters');

$app->get('/api/characters/:id', function($id) {
    (new \games\control\GamesController())->getCharacter($id);
})->name('character');

$app->post('/api/games/:id/comments', function($id) {
	$data =  array(
	"email" => 'xcosta@masson.net',
	"titre" => 'New comments',
	"contenu" => 'New comments'
	);
    (new \games\control\GamesController())->addComments($id,json_encode($data));
})->name('addComments');

$app->get('/api/comments/:id', function($id) {
	(new \games\control\GamesController())->comments($id);
})->name('commentsOnly');

$app->run();