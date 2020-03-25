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

$app->get('api/games/platform/:id', function($id){
	(new \games\control\GamesController())->getPlatform($id);
})->name('platform');

$app->run();