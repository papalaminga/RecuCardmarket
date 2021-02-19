<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colection extends Model
{
    use HasFactory;

    Protected $fillabe = ['Name', 'Simbol', 'Release'];
}
