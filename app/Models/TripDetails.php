<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripDetails extends Model
{
    use HasFactory;
    protected $table='trip_details';
    protected $primaryKey='id';

protected $fillable = ['trip_id', 'fileName'];


public function trip()
{
return $this->belongsTo(Trip::class,'trip_id');
}

}
