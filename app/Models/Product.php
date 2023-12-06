<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
	
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
	
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
	
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
	
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
