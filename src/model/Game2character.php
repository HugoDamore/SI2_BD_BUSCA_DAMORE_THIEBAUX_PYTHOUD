<?php


namespace games\model;


class Game2character
{

    protected $table = "game2character";
    protected $primaryKey = ['game_id', 'character_id'];
    public $timestamps = false;

}