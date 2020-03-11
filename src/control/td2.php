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

    /**
     * le rating initial (indiquer le rating board) des jeux dont le nom contient Mario
     */
    public function ratingMario() {
        $jeux = Game::where('name', 'like', '%Mario%')->get();

        foreach ($jeux as $jeu) {
            echo $jeu->name . ' : ';
            $ratings = $jeu->Rating()->get();
            foreach ($ratings as $rating){
                echo $rating->RatingBoard->name . ' ';
            }
            echo '<br><br>';
        }
    }

    /**
     * les jeux dont le nom débute par Mario et dont le rating initial contient "3+"
     */
    public function rating3plus() {
        $jeux = Game::where('name', 'like', 'Mario%')->get();

        foreach ($jeux as $jeu) {
            echo $jeu->name . ' : ' . '<br>';
            $ratings = $jeu->Rating()->get();

            foreach ($ratings as $rating){

                echo $rating->id  . "<br>";

            }
        }
    }

    /**
     * les jeux dont le nom débute par Mario, publiés par une compagnie dont le nom contient
     * "Inc." et dont le rating initial contient "3+"
     */
    public function rating3plusMarioInc(){

    }

    /**
     * les jeux dont le nom débute Mario, publiés par une compagnie dont le nom contient "Inc",
     * dont le rating initial contient "3+" et ayant reçu un avis de la part du rating board nommé
     * "CERO"
     */
    public function cero(){

    }

}