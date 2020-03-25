<?php


namespace games\control;


use games\model\Commentaire;
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

        $app->response->setStatus(200);
        $app->response->headers->set('Content-Type', 'application/json');
        echo json_encode($g->toArray());

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

        $type = $app->request->headers->get('Content-type');

        $commentaires = Commentaire::select('id', 'titre', 'contenu', 'created_at')->get()
            ->where('game_id', '=', $id_game);

        foreach ($commentaires as $comm){

            $user = $comm->utilisateur()->nom;

            array_push($comm_data, [
                'commentaire' => $comm,
                'utilisateur' => $user
            ]);

            echo json_encode(['games' => $comm_data]);
        }








    }
}
