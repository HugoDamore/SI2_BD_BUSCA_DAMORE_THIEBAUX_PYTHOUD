<?php


use games\control\td1;
use games\model\Game;


require '../vendor/autoload.php';
\games\AppConf::addDbConf('../config/conf.ini');


$control = new td1();
$control->jeuxMario();
//$control->companyJapon();
//$control->platformBase();
//$control->game442();



