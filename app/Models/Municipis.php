<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipis extends Model
{
    use HasFactory;
    protected $table = 'municipis';
    protected $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function comarques(){
        return $this->hasOne(Comarques::class);
    }
    public function cartesTrucades(){
        return $this->hasMany(CartesTrucades::class,'municipis_id');
    }
    public function agencies(){
        return $this->hasMany(Agencies::class,'municipis_id');
    }


}
