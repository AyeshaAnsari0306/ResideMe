<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'room_type', 
        'capacity',
        'price_per_semester',
        'is_available',
        'amenities',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'amenities' => 'array',
    ];
}