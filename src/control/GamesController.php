<?php


namespace games\control;


use games\model\Character;
use games\model\Commentaire;
use games\model\Platform;
use games\model\Utilisateur;
use games\model\Game;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Slim\Slim;

class GamesController
{

    public function getGame($id)
    {

        $app = Slim::getInstance();

        try {

            $g = Game::select('id', 'name', 'alias', 'deck', 'description', 'original_release_date')
                ->where("id", "=", $id)
                ->firstOrFail();

        } catch (ModelNotFoundException $e) {
            $app->response->setStatus(404);
            $app->response->headers->set('Content-Type', 'application/json');
            echo json_encode(['error' => 404, 'message' => "game not found"]);
            return;
        }
		
		$game = $g->toArray();
		$platform_data = [];
		foreach($g->Platforms as $plat){
			array_push($platform_data, [
				'id' => $plat->id,
				'nom' => $plat->name,
				'alias' => $plat->alias,
				'abbreviation' => $plat->abbreviation,
				'url' => ['href'=> $app->urlFor('platform', ['id' => $plat->id])]
			]);
		}
		
        $app->response->setStatus(200);
        $app->response->headers->set('Content-Type', 'application/json');

        echo json_encode(['game' => $game,
            'links' => [
                'comments' => ['href'=> $app->urlFor('games').$id.'/comments'],
                'characters' => ['href'=> $app->urlFor('games').$id.'/characters']
            ],
			'platform' => $platform_data
        ]);
    }

    public function getGames()
    {

        $app = Slim::getInstance();

        $page = ($app->request->params('page') > 0 ? $app->request->params('page') : 1);
        $size = 200;
        $number = Game::count();
        $last = intdiv($number, $size) + 1;
        $prev = (($page - 1 > 0) ? $page - 1 : 1);
        $next = (($page + 1 > $last) ? $last : $page + 1);

        $games = Game::select('id', 'name', 'alias')->skip(($page - 1) * $size)->take($size)->get();

        $app->response->setStatus(200);
        $app->response->headers->set('Content-Type', 'application/json');
        $games_data = [];
        foreach ($games as $game) {
            array_push($games_data, [
                'game' => $game,
                'links' => ['self' => ['href' => $app->urlFor('game', ['id' => $game->id])]]
            ]);
        }
		echo json_encode(['games' => $games_data,
						  'links' => [
								'first' => ['href'=> $app->urlFor('games').'?page=1'],
								'prev' => ['href'=> $app->urlFor('games').'?page='.$prev],
								'next' => ['href'=> $app->urlFor('games').'?page='.$next],
								'last' => ['href'=> $app->urlFor('games').'?page='.$last]
						 ]
			]);
    }

    /*
     * Pour chaque commentaire retourné dans la collection, la représentation contient l'id, le titre, le texte,
     * la date de création et le nom de l'utilisateur.
     */
    public function getComments($id_game) {

        $app = Slim::getInstance();

        $commentaires = Commentaire::select('id', 'titre', 'contenu', 'created_at', 'user_id')->where('game_id', '=', $id_game)->get();

        $comm_data = [];
		
		$app->response->setStatus(200);
		$app->response->headers->set('Content-type', 'application/json');
        foreach ($commentaires as $comm){

            array_push($comm_data, [
                'commentaire' => $comm,
                'utilisateur' => $comm->utilisateur->nom
            ]);
        }
        echo json_encode($comm_data);

    }
	
	public function getPlatform($id){
        $app = Slim::getInstance();

        try {

            $p = Platform::select('id', 'name', 'alias', 'deck', 'description')
                ->where("id", "=", $id)
                ->firstOrFail();

        } catch (ModelNotFoundException $e) {
            $app->response->setStatus(404);
            $app->response->headers->set('Content-Type', 'application/json');
            echo json_encode(['error' => 404, 'message' => "platform not found"]);
            return;
        }

        $app->response->setStatus(200);
        $app->response->headers->set('Content-Type', 'application/json');




        echo json_encode(['platform détaillée' => $p->toArray()]);

	}

    public function getCharacters($id_game) {
        $app = Slim::getInstance();

        $personnages = Character::whereHas('Games', function ($q) use ($id_game) {
                $q->where('game_id', '=', $id_game);
            })->addSelect('id', 'name', 'alias')->get();



        $perso_data = [];


        $app->response->setStatus(200);
        $app->response->headers->set('Content-Type', 'application/json');
        foreach ($personnages as $perso){

            array_push($perso_data, [
                'character' => $perso,
                'links' => ['self' => ['href' => $app->urlFor('character', ['id' => $perso->id])]]
            ]);
        }
        echo json_encode(['characters' => $perso_data]);

    }

    public function getCharacter($id_char){
        $app = Slim::getInstance();

        try {
            $c = Character::select('id', 'name', 'alias', 'description')
                ->where("id", "=", $id_char)
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $app->response->setStatus(404);
            $app->response->headers->set('Content-type', 'application/json');
            echo json_encode(['error'=>404, 'message'=>'character not found']);
            return ;
        }

        $app->response->setStatus(200);
        $app->response->headers->set('Content-Type', 'application/json');
        echo json_encode($c->toArray());
    }
	
	public function addComments($id,$JSON){
		$app = Slim::getInstance();
		
		$data = json_decode($JSON);
        $c = new Commentaire();
        $c->game_id = $id;
        $c->titre = $data->titre;
        $c->contenu = $data->contenu;
		$u = Utilisateur::where('email','like',$data->email)->first();
        $c->user_id = $u->id;
        $c->save();
        $app->response->redirect($app->urlFor('commentsOnly', ['id'=> $c->id]));
		
		
	}
	
	public function comments($id){
		$app = Slim::getInstance();

        try {
            $c = Commentaire::select('id', 'titre', 'contenu', 'created_at', 'game_id')
				->where('id','=',$id)
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $app->response->setStatus(404);
            $app->response->headers->set('Content-type', 'application/json');
            echo json_encode(['error'=>404, 'message'=>'character not found']);
            return ;
        }
		$app->response->setStatus(201);
		$app->response->headers->set('Content-Type', 'application/json');
        echo json_encode($c->toArray());
	}
}
