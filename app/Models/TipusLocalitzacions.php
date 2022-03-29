<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipusLocalitzacions extends Model
{
    use HasFactory;
    protected $table = 'tipus_localitzacions';
    protected $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;


    public function cartesTrucades(){
        return $this->hasMany(CartesTrucades::class,'tipus_localitzacions_id');
    }




}
