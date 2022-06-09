<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $touches = ['company'];

    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'company_id',
        'email',
        'phone',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}