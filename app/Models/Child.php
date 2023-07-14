<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
            'childFirstName',
            'childMiddleName',
            'childLastName',
            'childAge',
            'gender', 
            'differentAddress',
            'childAddress',
            'childCity',
            'childState',
            'childCountry',
            'childZipCode',
    ];

    protected $casts = [
        'differentAddress' => 'boolean',
    ];
}
