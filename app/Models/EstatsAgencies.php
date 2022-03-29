<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatsAgencies extends Model
{
    use HasFactory;

    protected $table = 'estats_agencies';
    //protected $primarykey = 'id';
    //public $incrementing = true;
    public $timestamps = false;

    public function cartesTrucadesHasAgencies()
    {
        return $this->hasMany(CartesTrucadesHasAgencies::class, 'estats_agencies_id');
    }

}
