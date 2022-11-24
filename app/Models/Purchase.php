<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function supliers(){
        return $this->belongsTo(Suplier::class,'suplier_id');
    }

    public function purchaseDetails(){
        return $this->hasMany(PurchaseDetail::class);
    }
}
