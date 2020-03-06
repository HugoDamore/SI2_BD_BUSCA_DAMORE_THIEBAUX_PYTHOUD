<?php


use games\control\td2;
use games\model\Game;


require '../vendor/autoload.php';
\games\AppConf::addDbConf('../config/conf.ini');


$control = new td2();
//$control->jeu12342();
$control->jeuCompSony();
