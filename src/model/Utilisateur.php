<?php


namespace games\model;


use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{

    protected $table = "utilisateur";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function Commentaires() {
        return $this->hasMany('games\model\Commentaire', 'user_id');
    }

}