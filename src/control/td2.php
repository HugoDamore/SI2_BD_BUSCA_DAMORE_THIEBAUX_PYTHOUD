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
	
	public function ratingInit() {
		$games = Game::where('name', 'like', '%mario%')->get();
		foreach($games as $game){
			echo $game->name;
			$ratings = $game->Rating()->get();
			foreach($ratings as $rating){
				echo $rating->name;
			}
		}
	}

    
}