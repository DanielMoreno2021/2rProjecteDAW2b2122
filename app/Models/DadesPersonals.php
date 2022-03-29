<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadesPersonals extends Model
{
    use HasFactory;

    protected $table = 'dades_personals';
    //protected $primarykey = 'id';
    //public $incrementing = true;
    public $timestamps = false;



   public function cartesTrucades()
   {
       return $this->hasMany(CartesTrucades::class, 'dades_personals_id');
   }
}
