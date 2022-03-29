<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartesTrucadesHasAgencies extends Model
{
    use HasFactory;
    protected $table = 'cartes_trucades_has_agencies';
    protected $primarykey = ['cartes_trucades_id','agencies_id','estats_agencies_id'];
    //public $incrementing = true;
    //public $timestamps = true;


    public function cartesTrucades(){
        return $this->belongsTo(CartesTrucades::class,'cartes_trucades_id');
    }
    public function agencies(){
        return $this->belongsTo(Agencies::class,'agencies_id');
    }
    public function estatsAgencies(){
        return $this->belongsTo(EstatsAgencies::class,'estats_agencies_id');
    }
}
