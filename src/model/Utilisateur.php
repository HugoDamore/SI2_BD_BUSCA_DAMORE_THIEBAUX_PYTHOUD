<?php


namespace games\model;


use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{

    protected $table = "utilisateur";
    protected $primaryKey = "email";
    public $timestamps = false;

    public function commentaires() {
        return $this->hasMany('games\model\Commentaires', 'email');
    }

}