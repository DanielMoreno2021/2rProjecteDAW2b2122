<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comarques extends Model
{
    use HasFactory;

    protected $table = 'comarques';
    //protected $primarykey = 'id';
    //public $incrementing = true;
    public $timestamps = false;


    public function municipis()
    {
        return $this->hasMany(Municipis::class, 'comarques_id');
    }

    public function provincies()
    {
        return $this->belongsTo(Provincies::class, 'provincies_id');
    }


}
