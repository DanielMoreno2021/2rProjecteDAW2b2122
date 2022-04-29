<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expedients extends Model
{
    use HasFactory;

    protected $table = 'expedients';
    //protected $primarykey = 'id';
    //public $incrementing = true;
    public $timestamps = false;

    public function estatsExpedients()
    {
        return $this->belongsTo(EstatsExpedients::class,'estats_expedients_id');
    }


    public function cartestrucades()
    {
        return $this->hasMany(CartesTrucades::class, 'expedients_id');
    }

}
