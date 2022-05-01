<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerarGraficos extends Model
{
    use HasFactory;

    protected $table = 'expedients';
    //protected $primarykey = 'id';
    //public $incrementing = true;
    public $timestamps = false;
}
