<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'serial_number', 'date', 'type', 'image'];

    // Add attribute casting
    protected $casts = [
        'date' => 'date',
    ];
}
