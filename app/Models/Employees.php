<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{

    use HasFactory;
    public $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'phone_no',
        'address',
        'postal_code',
        'id_no',
        'status'
    ];

    public function AddEmployees(){
        try {
            //code...
             self::create($this->fillable);
            return $this->result = "Item Added";
        } catch (\Throwable $th) {
            //throw $th;
            $this->result = $th->getMessage();
        }
    }


}
