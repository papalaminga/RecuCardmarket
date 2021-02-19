<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = 'cards';

    protected $primaryKey = 'IDcarta';

    Protected $fillable = ['Name','Tipe','Description','Colection'];

    public $timestamps = false;

    public function Venta(){

        return $this->hasMany('App\Models\Shop');
    }
}
