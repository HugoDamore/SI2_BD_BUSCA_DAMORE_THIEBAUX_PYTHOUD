<?php


namespace games\control;


use games\model\Game;
use games\model\Company;
use games\model\Utilisateur;
use games\model\Commentaire;
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
            $user->adresse = $faker->address;
            $user->save();
        }
    }

	public function creationCommentaires()
	{

		$faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
        	$post = new Commentaire();
        	$post->titre = $faker->realText(rand(10,30));
        	$post->contenu = $faker->realText(rand(50,150));
        	$post->created_at = $faker->dateTimeThisCentury->format('Y-m-d');
        	$post->updated_at = $faker->dateTimeBetween($startDate = $post->created_at, $endDate = 'now')->format('Y-m-d');
        	$post->user_id = $faker->numberBetween($min = 1, $max = 5);
        	$post->game_id = $faker->numberBetween($min = 1, $max = 47948);
        }

    }

}