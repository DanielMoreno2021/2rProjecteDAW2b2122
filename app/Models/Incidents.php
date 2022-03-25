<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Incidents extends Model
{
    use HasFactory;
    protected $table = 'incidents';
    protected $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;
}
