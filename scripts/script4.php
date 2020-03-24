<?php


require_once __DIR__ . '/../vendor/autoload.php';

\games\AppConf::addDbConf('../config/conf.ini');

$control = new \games\control\td4();

//$control->creationUtilisateurs();
//$control->creationCommentaires();

$control->q1();
//$control->q2();
