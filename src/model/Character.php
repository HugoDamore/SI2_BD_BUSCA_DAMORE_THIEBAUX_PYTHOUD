<?php


namespace games\model;


use Illuminate\Database\Eloquent\Model;

class Character extends Model
{

    protected $table = "character";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function PremiereApparition() {
        return $this->belongsTo('games\model\Game','first_appeared_in_game_id');
    }

    public function Games() {
        return $this->belongsToMany('games\model\Game', 'game2character',
                                    'character_id', 'game_id');
    }
}