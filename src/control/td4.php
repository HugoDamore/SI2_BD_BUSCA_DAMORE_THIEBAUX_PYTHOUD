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
		/*
        $user1 = new Utilisateur();
		$user2 = new Utilisateur();
		$user1->email = "ludo@ZiDresseur.com";
		$user1->nom = "Busca";
		$user1->prenom = "Ludovic";
		$user1->adresse = "1 rue du ZiBoss 90263 Malibu";
		$user1->tel = "0000000007";
		$user1->date_naiss = '1987-08-07';
		$user1->save();
		
		$user2->email = "@LeBest.com";
		$user2->nom = "Pokemon";
		$user2->prenom = "Sacha";
		$user2->adresse = "7 rue du pikachu 42652 Bourg Palette";
		$user2->tel = "0102030405";
		$user2->date_naiss = '1995-04-16';
		$user2->save();
*/
		$commentaire1 = new Commentaire();
		$commentaire2 = new Commentaire();
		$commentaire3 = new Commentaire();
		$commentaire4 = new Commentaire();
		$commentaire5 = new Commentaire();
		$commentaire6 = new Commentaire();
		
		$commentaire1->titre = "The Best 001";
		$commentaire1->contenu = "Un jour je serait";
		$commentaire1->created_at = '2020-03-24 10:36:00';
		$commentaire1->updated_at = '2020-03-24 10:46:00';
		$commentaire1->id = Utilisateur::select('id')->where('nom','like','Busca')->first();
		$commentaire1->game_id = 12342;
		
		$commentaire2->titre = "The Best 002";
		$commentaire2->contenu = "Un jour je serait";
		$commentaire2->created_at = '2020-03-24 10:37:00';
		$commentaire2->updated_at = '2020-03-24 10:47:00';
		$commentaire2->id = Utilisateur::select('id')->where('nom','=','Busca')->first();
		$commentaire2->game_id = 12342;
		
		$commentaire3->titre = "The Best 003";
		$commentaire3->contenu = "Un jour je serait";
		$commentaire3->created_at = '2020-03-24 10:38:00';
		$commentaire3->updated_at = '2020-03-24 10:48:00';
		$commentaire3->id = Utilisateur::select('id')->where('nom','=','Busca')->first();
		$commentaire3->game_id = 12342;
		
		$commentaire4->titre = "Pokemon 1";
		$commentaire4->contenu = "Un jour je serait";
		$commentaire4->created_at = '2020-03-24 10:39:00';
		$commentaire4->updated_at = '2020-03-24 10:49:00';
		$commentaire4->id = Utilisateur::select('id')->where('nom','=','Pokemon')->first();
		$commentaire4->game_id = 12342;
		
		$commentaire5->titre = "Pokemon 2";
		$commentaire5->contenu = "Le meilleur dresseur";
		$commentaire5->created_at = '2020-03-24 10:40:00';
		$commentaire5->updated_at = '2020-03-24 10:50:00';
		$commentaire5->id = Utilisateur::select('id')->where('nom','=','Pokemon')->first();
		$commentaire5->game_id = 12342;
		
		$commentaire6->titre = "Pokemon 3";
		$commentaire6->contenu = "Je me battrait sans répit";
		$commentaire6->created_at = '2020-03-24 10:41:00';
		$commentaire6->updated_at = '2020-03-24 10:51:00';
		$commentaire6->id = Utilisateur::select('id')->where('nom','=','Pokemon')->first();
		$commentaire6->game_id = 12342;
		
		$commentaire1->save();
		$commentaire2->save();
		$commentaire3->save();
		$commentaire4->save();
		$commentaire5->save();
		$commentaire6->save();
    }


}