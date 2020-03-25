<?php


namespace games\control;


use games\model\Game;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Slim\Slim;

class GamesController
{

    public function getGame($id)
    {

        $app = Slim::getInstance();

        try {

            $g = Game::select('id', 'name', 'alias', 'deck', 'description', 'original-release_date')
                ->where("id", "=", $id)
                ->firstOfFail();

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
    }
}
