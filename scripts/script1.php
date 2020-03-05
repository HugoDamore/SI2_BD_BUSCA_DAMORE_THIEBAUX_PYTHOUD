<?php


use games\control\td1;
use games\model\Game;


require '../vendor/autoload.php';
\games\AppConf::addDbConf('../config/conf.ini');


$control = new td1();
//$control->jeuxMario();
//$control->companyJapon();
//$control->platformBase();
//$control->game442();
$control->q4();


/**
 * Q5
 */
/*
$nb = Game::count();
echo 'il y a : ' . $nb;

/**
 *tous les jeux pour voir si ça passe
 */
/*
$games = Game::all();

foreach ($games as $game){
    echo $game->id . ' : ' . $game->name . ' : ' . $game->alias . "\n" . $game->description . "\n\n";
}

/**
 * avec skip/take
 */
/*
$n = 0;

while ($n<=$nb){
    $games = Game::take(500)->skip($n)->get();
    foreach ($games as $game) {
        echo $game->id . ' : ' . $game->name . ' : ' . $game->alias . "\n";
    }
    $n+=500;
}

/**
 * chunking
 */

/*
$n=1;
Game::chunk(500, function($games) use ($n) {

    print "games : $n \n";
    print "-----------\n";
    //print
});
*/

