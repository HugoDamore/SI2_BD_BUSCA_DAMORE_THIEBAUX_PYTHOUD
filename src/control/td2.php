<?php


namespace games\control;


use games\model\Company;
use games\model\Game;

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

    public function personnagesJeuMario() {
        $jeux = Game::where('name', 'like', '%Mario%')->get();

        foreach ($jeux as $jeu) {
            echo $jeu->name . " : "."<br>";

            $persos = $jeu->Personnages()->get();

            foreach ($persos as $perso) {
                echo $perso->name . ', ';
            }
            echo "<br>";
            echo "<br>";
        }
    }

    public function jeuCompSony() {
        $companies = Company::where('name', 'like', 'Sony%')->get();

        foreach ($companies as $company){
            echo $company->name . ' : ' . '<br>';
            $jeux = $company->JeuxDev()->get();

            foreach ($jeux as $jeu) {
                echo $jeu->name . ', ';
            }
            echo '<br>';
        }
    }

    /*
     * les jeux dont le nom débute par Mario et ayant plus de 3 personnages
     */
    public function jeuMario3Persos() {
        $jeux = Game::where('name', 'like', 'Mario%')->get();

        foreach ($jeux as $jeu) {
            $nbpersos = count($jeu->Personnages()->get());

            if ($nbpersos > 3){
                echo $jeu->name. '<br>';
            }
        }
    }

}