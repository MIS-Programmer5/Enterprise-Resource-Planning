<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    //

    protected $table = 'classifications';

    protected $fillable = [
        'name',
        'category_id',
    ];

    public function items()
    {
        return  $this->hasMany(Item::class, 'class_id', 'id');
    }
     public function SubClass()
    {
        return  $this->hasMany(SubClass::class,'parent', 'id');
    }
     public function category()
    {
        return  $this->belongsTo(Category::class, 'category_id', 'id');
    }




}
