<?php


require_once __DIR__ . '/../vendor/autoload.php';

use games\model\Game;
use Illuminate\Database\Capsule\Manager as DB;


\games\AppConf::addDbConf('../config/conf.ini');

echo "<h2>Mesures des temps d'execution</h2>";

$control = new \games\control\td3();

//$control->q1();
$control->q2();
$control->q3();
$control->q4();


echo "<h2>Questions sur les index</h2>";




