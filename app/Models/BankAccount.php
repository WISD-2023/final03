<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
	
    protected $fillable = [
        'bank_code',
        'account',
    ];
	
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
