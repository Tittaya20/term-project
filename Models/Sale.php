<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sale';

    protected $fillable = [
        'sale_user_id',
        'payment_status',
        'sumtotal',
        
    ];
}