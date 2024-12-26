<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Items extends Model
{

    use HasFactory;
   public $fillable = [
        'name',
        'code',
        'cost_id',
        'category_id',
        'class_id',
        'sub_class_id',
        'status_id',
    ];
    public $result;
    public $item_id;

    public function __construct()
    {

    }
  public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function class()
    {
        return $this->belongsTo(Classification::class, 'class_id', 'id');
    }

     public function subclass()
    {
        return $this->belongsTo(SubClass::class, 'sub_class_id', 'id');
    }
     public function UnitOfMeasure()
    {
        return $this->hasMany(UnitMeasure::class, 'item_id', 'id');
    }



       public function Getitems(){
        try {
            //code...
            $this->result = self::all();
            return $this->result;
        } catch (\Throwable $th) {
            //throw $th;
            $this->result = $th->getMessage();
        }
    }

    public function updateitems(){
        try {
            //code...
            $item = self::find($this->item_id);
            $item->update([
                'name' => $this->fillable['name'],
                'code' => $this->fillable['code'],
                'cost' => $this->fillable['cost'],
                'category_id' => $this->fillable['category_id'],
                'class_id' => $this->fillable['class_id'],
                'sub_class_id' => $this->fillable['sub_class_id'],
                'status_id' => $this->fillable['status_id'],
            ]);
            return $this->result = "Item Updated";
        } catch (\Throwable $th) {
            //throw $th;
            $this->result = $th->getMessage();
        }
    }

}
