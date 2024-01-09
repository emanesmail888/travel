<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTrip extends Model
{
    use HasFactory;
    protected $table="order_trip";

    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function trip(){
        return $this->belongsTo(Trip::class);
    }
}
