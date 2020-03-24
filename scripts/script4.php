<?php


require_once __DIR__ . '/../vendor/autoload.php';

\games\AppConf::addDbConf('../config/conf.ini');

$control = new \games\control\td4();

$control->creationUtilisateurs();
$control->creationCommentaires();

//$control->q1();
<<<<<<< HEAD
//$control->q2();
=======
$control->q2();
>>>>>>> f035c61654dc27276a9d070787fb32992e048601
