<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tripType extends Model
{
    use HasFactory;
    protected $table='trip_types';
    protected $primaryKey='id';
    protected $fillable=['type','trip_id'];

    public function trip(){

       return $this->belongsTo(Trip::class,'trip_id');
     }

}
