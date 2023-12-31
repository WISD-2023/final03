<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
	
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    // 連鎖刪除
	// 刪除其關係資料表之資料
    protected static function booted () {
        static::deleting(function(Order $order) { // before delete() method call this
            $order->orderDetails()->delete();
            // do the rest of the cleanup...
        });
    }
}
