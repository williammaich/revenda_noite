<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposta extends Model
{
    protected $fillable = array('nome','telefone','email','preco','carro_id');


    public function carro(){
        return $this->belongsTo('App\Carro');
    }

    public function setPreconAtribute($value){
        $novo1 = str_replace('.','',$value);
        $novo2 = str_replace(',','.', $novo1);
        $this->atributes['preco'] = $novo2;
    }


}
