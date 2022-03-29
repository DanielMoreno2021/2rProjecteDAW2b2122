<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincies extends Model
{
    use HasFactory;
    protected $table = 'provincies';
    protected $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;


    public function cartesTrucades(){
        return $this->hasMany(CartesTrucades::class,'provincies_id');
    }
    public function comarques(){
        return $this->hasMany(Comarques::class,'provincies_id');
    }

}
