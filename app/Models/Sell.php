<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;

    Protected $table = 'sells';

    Protected $fillable = ['Card','Quantity','Price','Seller'];

    Protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
}
