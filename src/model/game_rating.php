<?php


namespace games\model;


use Illuminate\Database\Eloquent\Model;

class game_rating extends Model
{

    protected $table = "game_rating";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function RatingBoard() {
    	return $this->belongsTo('games\model\rating_board', 'rating_board_id');
    }

}