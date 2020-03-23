<?php


require_once __DIR__ . '/../vendor/autoload.php';

use games\model\Game;
use Illuminate\Database\Capsule\Manager as DB;

\games\AppConf::addDbConf('../config/conf.ini');

$control = new \games\control\td3();

/*echo "<h2>Mesures des temps d'execution</h2>";

$control->q1();
$control->q2();
$control->q3();
$control->q4();

echo "<h2>Questions sur les index</h2>";
$control->q5_1();
$control->q5_2();
$control->q5_3();
*/


//$control->jeuxMario();
//$control->jeu12342();
$control->premiereAppMario();
//$control->personnagesJeuMario();
//$control->jeuCompSony();

//Question 3 a finir

