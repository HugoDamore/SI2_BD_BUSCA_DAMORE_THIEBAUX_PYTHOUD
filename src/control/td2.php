<?php


namespace games\control;


use games\model\Game;

class td2
{

    public function __construct() {}

    public function jeu12342(){
        $jeu = Game::where('id', '=', '12342')->first();
        $persos = Game::where('id', '=', '12342')->Personnages()->get();

        echo $jeu->name . ' : ' . $jeu->deck;
        foreach ($persos as $perso) {
            echo $perso->name . '<br>';
        }
    }
}