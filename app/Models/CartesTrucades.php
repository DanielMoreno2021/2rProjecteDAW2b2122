<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartesTrucades extends Model
{
    use HasFactory;
    protected $table = 'cartes_trucades';
    //protected $primarykey = 'id';
    //public $incrementing = true;
    public $timestamps = false;

    public function cartesTrucadesHasAgencies()
    {
        return $this->hasMany(CartesTrucadesHasAgencies::class, 'cartes_trucades_id');
    }

    public function provincies(){
        return $this->hasOne(Provincies::class);
    }

    public function municipis(){
        return $this->hasOne(Municipis::class);
    }
    public function dadesPersonals(){
        return $this->hasOne(DadesPersonals::class);
    }
    public function usuari(){
        return $this->hasOne(Usuari::class);
    }
    public function tipusLocalitzacions(){
        return $this->hasOne(TipusLocalitzacions::class);
    }
    public function expedients(){
        return $this->hasOne(Expedients::class);
    }
    public function incidents(){
        return $this->hasOne(Incidents::class);
    }






}
