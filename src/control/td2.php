<?php


namespace games\control;


use games\model\Game;
use games\model\Game2character;

class td2
{

    public function __construct() {}

    public function jeu12342(){
        $jeu = Game::where('id', '=', '12342')->first();
        $persos = $jeu->Personnages()->get();

        echo $jeu->name . ' : ' . $jeu->deck;
        foreach ($persos as $perso) {
            echo $perso->name . '<br>';
        }
    }
}