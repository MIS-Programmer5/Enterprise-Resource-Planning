<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;
    public $fillable = [
        'name',
        'description',
        'item_alias',
        'qty_type',
    ];

     public function classifications()
    {
        return  $this->hasMany(Classification::class, 'category', 'id');
    }


}
