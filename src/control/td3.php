<?php


namespace games\control;


use games\model\Game;

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


}