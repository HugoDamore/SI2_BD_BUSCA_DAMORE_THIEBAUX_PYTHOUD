<?php

namespace games\control;

use games\model\Company;
use games\model\Game;
use games\model\Platform;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;


class td1
{

    public function __construct()
    {
    }

    public function jeuxMario() {
        $liste = Game::where('name', 'like', '%mario%')->get();

        foreach ($liste as $game) {
            echo $game->name . ' : ' . $game->alias . "\n";
        }

        echo "Jeux dont le titre contient Mario : " . count($liste) . "<br>";

    }

    public function companyJapon() {
        $liste = Company::where('location_country', '=', 'Japan')->get();

        foreach ($liste as $comp) {
            echo $comp->name. "<br>";
        }

        echo "Companies situées au Japon : ".count($liste)."<br>";
    }

    /**
     * lister les plateformes dont la base installée est >= 10 000 000 install_base
     */
    public  function platformBase() {
        $liste = Platform::where('install_base', '>=', '10000000')->get();

        foreach ($liste as $platform) {
            echo $platform->name. " : " . $platform->alias. "<br>";
        }

        echo "Platformes avec une base installée >= 10 000 000 : ". count($liste);
    }

    /**
     *  lister 442 jeux à partir du 21173ème,
     */
    public function game442() {
        $listeJeu = Game::take(442)->skip(21173)->get();

        foreach ($listeJeu as $game) {
            echo $game->id . '  ' . $game->name . ' : ' . $game->alias . "<br>";
        }

    }



    /**
     * lister les jeux, afficher leur nom et deck, en paginant (taille des pages : 500)
     */
    public function jeuxPagination() {
        $nb = Game::count();
        echo 'il y a : ' . $nb;

        $games = Game::all();

        /**
        foreach ($games as $game){
            echo $game->id . ' : ' . $game->name . ' : ' . $game->alias . "\n" . $game->description . "\n\n";
        }*/

        $n = 0;

        while ($n<=$nb){
            $games = Game::take(500)->skip($n)->get();
            foreach ($games as $game) {
                echo $game->id . ' : ' . $game->name . ' : ' . $game->alias . "\n";
            }
            $n+=500;
        }
    }
}