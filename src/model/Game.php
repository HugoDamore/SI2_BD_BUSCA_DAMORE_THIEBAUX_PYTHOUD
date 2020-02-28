<?php

namespace games\model;
use Illuminate\Database\Eloquent\Model;


class Game extends Model
{
    protected $table = "game";
    protected $primaryKey = "id";
    public $timestamps = false;


}