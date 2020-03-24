<?php


require_once __DIR__ . '/../vendor/autoload.php';

\games\AppConf::addDbConf('../config/conf.ini');

$control = new \games\control\td4();

$control->creationUtilisateurs();
$control->creationCommentaires();

<<<<<<< HEAD
$control->q1();
=======
//$control->q1();
<<<<<<< HEAD
//$control->q2();
=======
>>>>>>> 6bc99eccbd6ca1388e109cfc2a3c3d366a8a71cf
$control->q2();
>>>>>>> f035c61654dc27276a9d070787fb32992e048601
