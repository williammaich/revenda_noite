<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = array('nome','pais');

    public static function orderBy($string)
    {
    }
}
