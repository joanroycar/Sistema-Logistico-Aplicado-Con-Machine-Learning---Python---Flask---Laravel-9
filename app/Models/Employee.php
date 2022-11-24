<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function employeetypes(){
    
        return $this->belongsTo(EmployeeType::class,'employee_type_id');

    }
    public function areas(){
    
        return $this->belongsTo(Area::class,'area_id');

    }


}
