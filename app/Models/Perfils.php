<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfils extends Model
{
    use HasFactory;
    protected $table = 'municipis';
    protected $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;


    public function usuaris(){
        return $this->hasMany(Usuari::class,'perfils_id');
    }
}
