<?php


namespace games\model;


use Illuminate\Database\Eloquent\Model;

class Character extends Model
{

    protected $table = "character";
    protected $primaryKey = "id";
    public $timestamps = false;

}