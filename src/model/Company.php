<?php


namespace games\model;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{

    protected $table = "company";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function JeuxDev() {
        return $this->belongsToMany('games\model\Game',
            'game_developers', 'game_id', 'comp_id');
    }
}