<?php


require_once __DIR__ . '../../../vendor/autoload.php';

use games\model\Game;
use Illuminate\Database\Capsule\Manager as DB;


require '../../vendor/autoload.php';
\games\AppConf::addDbConf('../../config/conf.ini');

$timestart = microtime(true);

$game = Game::get();

$timeend = microtime(true);

$time = $timeend - $timestart;

$page_load_time = number_format($time, 3);

echo "<h2>Temps d'exécution de la requete : " . $page_load_time . " sec<br><br><br></h2>";

