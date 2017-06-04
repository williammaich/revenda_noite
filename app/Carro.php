<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{


    protected $fillable = array('modelo','marca_id','cor','ano','preco','combustivel','destaque');

    public function marca()
    {
        return $this->belongsTo('App\Marca');
    }

    public function proposta()
    {
        return $this->belongsTo('App\Proposta');
    }

   public function getCombustivelAttribute($value){
       if($value=="A"){
           return "Álcool";
       }else if ($value == "G"){
           return "Gasolina";
       }else if($value=="F"){
           return "Flex";
       } else if($value=="D"){
           return "Diesel";
       }





   }


   public function setPrecoAttribute($value){
       $novo1 = str_replace('.','',$value);
       $novo2 = str_replace(',','.',$novo1);
       $this->attributes['preco']=$novo2;

   }




}
