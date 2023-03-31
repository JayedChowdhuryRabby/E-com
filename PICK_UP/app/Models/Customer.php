<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasApiTokens,HasFactory;
    protected $fillable = [
        'name',
        'customer_id',
        'email',
        'password',
        'address',
        'phone',
       
    ];
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
