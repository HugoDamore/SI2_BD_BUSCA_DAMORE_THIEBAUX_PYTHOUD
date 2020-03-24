<?php


namespace games\control;


use games\model\Utilisateur;
use games\model\Commentaire;
use Faker;

class td4 {

    public function creationUtilisateurs()
    {

    	$faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 100; $i++) {
            $user = new Utilisateur();
            $user->nom = $faker->lastName;
            $user->prenom = $faker->firstName;
            $user->email = $faker->unique()->email;
            $user->date_naiss = $faker->dateTimeBetween($startDate = '-80 years', $endDate = '-12 years')->format('Y-m-d');
            $user->tel = $faker->phoneNumber;
            $user->adresse = $faker->address;
            $user->save();
        }
    }

	public function creationCommentaires()
	{

		$faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 1000; $i++) {
        	$post = new Commentaire();
        	$post->titre = $faker->realText(rand(10,30));
        	$post->contenu = $faker->realText(rand(50,150));
        	$post->created_at = $faker->dateTimeThisDecade;
        	$post->updated_at = $faker->dateTimeBetween($startDate = $post->created_at, $endDate = 'now');
        	$post->user_id = $faker->numberBetween($min = 1, $max = 100);
        	$post->game_id = $faker->numberBetween($min = 1, $max = 47948);
        	$post->save();
        }

    }

    /**
     * lister les commentaires d'un utilisateur donné, afficher la date du commentaire de façon
     * lisible, ordonnés par date décroissante,
     */
    public function q1() {
        $user = Utilisateur::where('id', '=', '28')->first();
        $commentaires = $user->Commentaires()->get();

        foreach ($commentaires as $comm) {
            echo $comm->created_at .' ' . $comm->titre . '<br>';
        }
    }

    /**
     * lister les utilisateurs ayant posté plus de 5 commentaires.
     */
    public function q2() {
        $users = Utilisateur::all();

        foreach ($users as $user) {
            if (($user->Commentaires())->count() > 5 ) {
                echo $user->email . '<br>';
            }
        }
    }

    /**
     * Programmer un script php qui crée 2 utilisateurs, 3 commentaires par utilisateurs, tous concernant le
     * jeu 12342.
     */
    public function q3() {
        
    }


}