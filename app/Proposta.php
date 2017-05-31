<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposta extends Model
{
    protected $fillable = array('nome','email','telefone','prop');
}
