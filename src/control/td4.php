<?php


namespace games\control;


use games\model\Game;
use games\model\Company;
use Illuminate\Database\Capsule\Manager as DB;

use Games\Utilisateur;

class td4 {

    public function creationUtilisateurs()
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 5; $i++) {
            $user = new Utilisateur;
            $user->nom = $faker->lastName;
            $user->prenoms = $faker->firstName;
            $user->email = $faker->unique()->email;
            $user->date_naissance = $faker->dateTimeThisCentury->format('Y-m-d');
            $user->telephone = $faker->phoneNumber;
            $user->save();
        }
    }
}