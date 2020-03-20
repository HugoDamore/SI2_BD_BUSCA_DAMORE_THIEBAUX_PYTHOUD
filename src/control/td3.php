<?php


namespace games\control;


class td3
{

    public function __construct()
    {
    }

    public function q1(){
        echo "<h3>q1</h3>";
        $start = microtime(true);
        $games = Game::get();
        $end = microtime(true);
        $tmp = $end - $start;
        echo "Time : ".$tmp;
    }

    public function q2(){
        echo "<h3>q2</h3>";
        $start = microtime(true);
        $games = Game::where('name','like','%Mario%')->get();
        $end = microtime(true);
        $tmp = $end - $start;
        echo "Time : ".$tmp;
    }

    public function q3(){
        echo "<h3>q3</h3>";
        $start = microtime(true);
        $jeux = Game::where('name', 'like', '%Mario%')->get();
        foreach ($jeux as $jeu) {
            echo $jeu->name . " : " . "<br>";
        }
        $end = microtime(true);
        $tmp = $end - $start;
        echo "<br>";
        echo "Time : ".$tmp;
    }

    public function q4(){
        echo "<h3>q4</h3>";
        $start = microtime(true);
        $jeux = Game::where('name', 'like', '%Mario%')->get();
        foreach ($jeux as $jeu) {
            echo $jeu->name . " : " . "<br>";
            $persos = $jeu->Personnages()->get();
            foreach ($persos as $perso) {
                echo $perso->name . ', ';
            }
        }
        $end = microtime(true);
        $tmp = $end - $start;
        echo "<br>";
        echo "Time : ".$tmp;
    }


}