<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table='categories';
    protected $primaryKey='id';
    protected $fillable=['title','image'];


    public function trips(){
        return $this->hasMany(Trip::class);
    }

    public function tripTypes()
{

return $this->hasMany(tripType::class,'category_id');
}


}
