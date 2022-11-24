<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function categories(){
    
        return $this->belongsTo(Category::class,'category_id');

    }
    public function measures(){
    
        return $this->belongsTo(UnitMeasure::class,'unit_measure_id');

    }
    public function supliers(){
    
        return $this->belongsTo(Suplier::class,'suplier_id');

    }

    public function orders(){
        return $this->hasMany(OrderDetail::class);
    }
    public function outdateds(){
        
        return $this->hasMany(Outdated::class);
    }

}
