<?php

namespace games\model;
use Illuminate\Database\Eloquent\Model;


class Genre extends Model
{
    protected $table = "genre";
    protected $primaryKey = "id";
    public $timestamps = false;
	
	public function Game() {
		return $this->belongsToMany('games\model\Game',
			'game2genre', 'genre_id', 'game_id');
		
	}
	
}