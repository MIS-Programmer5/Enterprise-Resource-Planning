<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubClass extends Model
{

    protected $table = 'classifications';

    protected $fillable = [
        'name',
        'category_id',
        'parent'
    ];

    //
    public function items()
    {
        return  $this->hasMany(Item::class, 'sub_class_id', 'id');
    }
     public function Classification()
    {
         return $this->hasOne(Classification::class, 'parent', 'id');
    }
}
