<?php


require_once __DIR__ . '/../vendor/autoload.php';

use games\model\Game;
use Illuminate\Database\Capsule\Manager as DB;

\games\AppConf::addDbConf('../config/conf.ini');

$control = new \games\control\td4();

$control->creationUtilisateurs();
