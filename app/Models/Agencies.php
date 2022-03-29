<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agencies extends Model
{
    use HasFactory;

    protected $table = 'agencies';
    //protected $primarykey = 'id';
    //public $incrementing = true;
    public $timestamps = false;


    public function municipis()
    {
        return $this->belongsTo(Municipis::class,'municipis_id');
    }

    public function cartesTrucadesHasAgencies()
    {
        return $this->hasMany(CartesTrucadesHasAgencies::class, 'agencies_id');
    }


}
