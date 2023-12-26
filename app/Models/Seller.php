<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
	
    protected $fillable = [
        'secret_key',
        'secret_iv',
    ];
	
    public function orders(){
        return $this->hasMany(Order::class);
    }
	
    public function products(){
        return $this->hasMany(Product::class);
    }
	
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
