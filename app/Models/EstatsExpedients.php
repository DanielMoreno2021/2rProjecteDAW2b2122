<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatsExpedients extends Model
{
    use HasFactory;

    protected $table = 'estats_expedients';
    //protected $primarykey = 'id';
    //public $incrementing = true;
    public $timestamps = false;


 public function expedients()
 {
     return $this->belongsTo(Expedients::class, 'estats_expedients_id');
 }

}
