<?php


namespace games\control;


use games\model\Game;
use games\model\Company;
use games\model\Utilisateur;
use Illuminate\Database\Capsule\Manager as DB;
use Faker;

class td4 {

    public function creationUtilisateurs()
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 5; $i++) {
            $user = new Utilisateur();
            $user->nom = $faker->lastName;
            $user->prenom = $faker->firstName;
            $user->email = $faker->unique()->email;
            $user->date_naiss = $faker->dateTimeThisCentury->format('Y-m-d');
            $user->tel = $faker->phoneNumber;
            $user->save();
        }
    }
}