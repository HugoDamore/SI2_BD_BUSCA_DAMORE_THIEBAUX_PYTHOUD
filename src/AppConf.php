<?php

namespace games;


use Illuminate\Database\Capsule\Manager;

class AppConf {

    public static function addDbConf ($file) {
        $conf = parse_ini_file($file);
        $db = new Manager();

        $db->addConnection($conf);
        $db->setAsGlobal();
        $db->bootEloquent();
    }
}
