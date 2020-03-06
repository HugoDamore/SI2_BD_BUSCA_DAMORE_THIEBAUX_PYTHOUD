<?php


namespace games\model;


use Illuminate\Database\Eloquent\Model;

class Game2character extends Model
{

    protected $table = "game2character";
    //protected $primaryKey = ['game_id', 'character_id'];
    protected $primaryKey = null;
    public $timestamps = false;

}