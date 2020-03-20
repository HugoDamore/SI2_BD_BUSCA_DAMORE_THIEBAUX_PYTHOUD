<?php


namespace games\control;


use games\model\Game;
use games\model\Company;
use Illuminate\Database\Capsule\Manager as DB;

class td3
{

    public function __construct()
    {
		DB::connection()->enableQueryLog();
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
        foreach ($games as $game){
            echo $game->name . '<br>';
        }
        $end = microtime(true);
        $tmp = $end - $start;
        echo "<br>";
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

    public function q5_1(){
        echo "<h3>q5 - première valeur</h3>";
        $start = microtime(true);
        $games = Game::where('name', 'like', 'Mario%')->get();
        foreach ($games as $game){
            echo $game->name . '<br>';
        }
        $end = microtime(true);
        $tmp = $end - $start;
        echo "<br>";
        echo "Time : ".$tmp;
    }

    public function q5_2(){
        echo "<h3>q5 - deuxième valeur</h3>";
        $start = microtime(true);
        $games = Game::where('name', 'like', 'Sonic%')->get();
        foreach ($games as $game){
            echo $game->name . '<br>';
        }
        $end = microtime(true);
        $tmp = $end - $start;
        echo "<br>";
        echo "Time : ".$tmp;
    }

    public function q5_3(){
        echo "<h3>q5 - troisième valeur</h3>";
        $start = microtime(true);
        $games = Game::where('name', 'like', 'Run%')->get();
        foreach ($games as $game){
            echo $game->name . '<br>';
        }
        $end = microtime(true);
        $tmp = $end - $start;
        echo "<br>";
        echo "Time : ".$tmp;
    }

    /**
     * créer un index sur la colonne 'name' de la table 'game'
     * CREATE INDEX `index_game_name` ON `game` (`name`)
     */

    /**
     * Test des questions précédentes avec des nouvelles valeurs
     *
     * On constate que les requêtes sont beaucoup plus rapides avec un index.
     */
	public function affichelog(){
		$querys = DB::getQueryLog();
		$i = 0;
		echo("------------------------------------------".'<br>');
		foreach($querys as $query){
			echo("Requete : " . $query["query"] . '<br>');
			var_dump($query['bindings']);
			echo("Binding : " . $query["bindings"][0] . '<br>');
			echo("Temps : " . $query["time"] . '<br>'. '<br>');
			$i++;
		}
		echo "Il y a eu " . $i . " requète execute";
		
	}
	
	public function jeuxMario() {
        $liste = Game::where('name', 'like', '%mario%')->get();

        foreach ($liste as $game) {
            echo $game->name . ' : ' . $game->alias . "\n";
        }

        echo "Jeux dont le titre contient Mario : " . count($liste) . "<br>";
		$this->affichelog();

    }
	
	public function jeu12342(){
        $jeu = Game::where('id', '=', '12342')->first();
        $persos = $jeu->Personnages()->get();

        echo $jeu->name . ' : ' . $jeu->deck;
        foreach ($persos as $perso) {
            echo $perso->name . '<br>';
        }
		$this->affichelog();
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
		$this->affichelog();
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
		$this->affichelog();
    }

}