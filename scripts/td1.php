<?php


use games\model\Game;

require '../vendor/autoload.php';
\games\AppConf::addDbConf('../config/conf.ini');

/**
 * Q1 : liste des jeux dont le nom contient Mario
 */

$liste = Game::where('name', 'like', '%mario%')->get();

foreach ($liste as $game) {
    echo $game->name . ' : ' . $game->alias . "\n";
}

echo "Jeux dont le titre contient Mario : " . count($liste) . "\n";


/**
 * Q2 : Liste des compagnies intallées au Japon
 */


