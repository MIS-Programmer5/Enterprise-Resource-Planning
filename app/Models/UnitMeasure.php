<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitMeasure extends Model
{
    use HasFactory;
    protected $table = 'unit_measure';
    protected $fillable = [
        'um_name',
        'item_id',
        'um_code',
        'unit_type',
        'quantity',
        'parent'

    ];

    public function items()
    {
        return $this->hasMany(Item::class, 'um_id', 'id');
    }

    public function BaseUnit()
    {
        return $this->hasMany(UnitMeasure::class, 'parent', 'id');
    }
}

