<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $table='trips';
    protected $primaryKey='id';
    protected $fillable=['trip_title','trip_price','program','image','activities','category_id','tripType','season','duration','fileName','from','to'];

    public function categories(){
        return $this->belongsToMany('Category','categories');
    }


    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function tripDetails(){

            return $this->hasMany(TripDetails::class);
        }










    public function setTripAttribute($value)
    {
        $this->attributes['tripType'] = json_encode($value);
    }


    public function getTripAttribute($value)
    {
        return $this->attributes['tripType'] = json_decode($value);
    }

}

