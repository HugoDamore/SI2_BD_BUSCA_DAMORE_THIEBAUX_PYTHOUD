<?php

namespace games\model;
use Illuminate\Database\Eloquent\Model;


class Game extends Model
{
    protected $table = "game";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function Personnages() {
        return $this->belongsToMany('games\model\Character',
             'game2character', 'character_id', 'game_id');
    }

    public function CompanyDev() {
        return $this->belongsToMany('games\model\Company',
            'game_developers', 'comp_id', 'game_id');
    }
	
	public function Rating() {
		return $this->belongsToMany('games\model\game_rating',
			'game2rating', 'game_id', 'rating_id');
	}

	public function CompanyPublishers() {
        return $this->belongsToMany('games\model\Company',
            'game_publishers', 'game_id', 'comp_id');
    }
	
	public function Platforms() {
        return $this->belongsToMany('games\model\Platform',
            'game2platform', 'platform_id', 'game_id');
    }

    public function PremiersPersonnages(){
        return $this->hasMany('games\model\Character',
            'first_appeared_in_game_id');
    }

}