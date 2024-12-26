<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Company;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_name',
        'branch_address',
        'branch_email',
        'branch_code',
        'branch_type',
        'company_id',
        'branch_cell',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


}
